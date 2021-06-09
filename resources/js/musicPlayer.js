// Addapted from https://github.com/bradtraversy/vanillawebprojects/tree/master/music-player

export default function musicPlayer() {
  const progress = $('#progress'); const progressContainer = $('#progress-container');
  const volumeBar = $('#volume-level'); const volumeContainer = $('#volume-container');
  const currTime = $('#current-duration'); const durTime = $('#total-duration');

  const playList = document.getElementsByClassName("audio-item");
  const audioItems = document.getElementsByClassName("audio-player"); // get <audio> elements

  let audioIndex = 0;
  let playing = false;
  let volume = 0.8; volumeBar.width(`${volume * 100}%`); // set default at 4/5
  let muted = false; let volIcon; let volSwitch;
  let currentAudio = audioItems[audioIndex]; // Load first
  changePlaylistItem();

  $('#audio-play').click( playAudio );
  $('#audio-pause').click( pauseAudio );
  $('#audio-prev').click( prevAudio );
  $('#audio-next').click( nextAudio );
  $('#audio-volume').click( toggleVolume );
  progressContainer.click( setProgress );
  volumeContainer.click( setVolume );
  $('.audio-item').click( selectAudio );
  //----------------------------------------------------//
  // Initiate all items, add time and event listeners
  //----------------------------------------------------//
  for (let i = 0; i < audioItems.length; i++) {
    let item = audioItems[i];
    item.onloadedmetadata = () => {
      if (i == 0) {
        durTime.html( get_sec_d(currentAudio.duration) ); // set the main player to first item
      }
      let duration = item.duration;
      let time = document.createElement("time");
      time.classList.add("list-time");
      let displayTime = get_sec_d(duration); //convert to min:sec format
      time.innerHTML = displayTime;
      item.previousElementSibling.append(time) // <audio> comes after the display list item
      // Set progress bars for each
      item.addEventListener('timeupdate', (e) => {
        updateProgress(e);
        updateTime(e);
      });
      item.addEventListener('ended', nextAudio);
    }
  }
  //----------------------------------------------------//

  function playAudio() {
    $("#audio-play").swapOut();
  	$("#audio-pause").swapIn();
    currentAudio.play()
    playing = true;
  }
  function pauseAudio() {
    $("#audio-play").swapIn();
    $("#audio-pause").swapOut();
    currentAudio.pause()
    playing = false;
  }

  function selectAudio() {
    currentAudio.currentTime = 0; // Reset current progress
    audioIndex = $('.audio-item').index(this); // Search for the clicked item in the playlist and get its position
    loadAudio();
    changePlaylistItem();
    playAudio();
  }

  function changePlaylistItem() {  //comes after new index set
    $('.audio-item').removeClass('playing'); // unmark previous
    $('.audio-item').eq(audioIndex).addClass('playing'); // mark current item
  }

  function loadAudio() {
    currentAudio.pause();
    currentAudio = audioItems[audioIndex];
    durTime.html( get_sec_d(currentAudio.duration) )
    if (playing) { currentAudio.play(); }
  }
  function nextAudio() {
    currentAudio.currentTime = 0; // Reset current progress
    audioIndex++;
    if (audioIndex > audioItems.length - 1) {
      audioIndex = 0;
    }
    loadAudio();
    changePlaylistItem();
  }
  function prevAudio() {
    currentAudio.currentTime = 0; // Reset current progress
  	audioIndex--;
    if (audioIndex < 0) {
      audioIndex = audioItems.length - 1;
    }
    loadAudio();
    changePlaylistItem();
  }

  function toggleVolume() {
    if (muted) { // if muted, then unmute
      volumeBar.width(`${volume * 100}%`);
      volIcon = '#volume';
      volSwitch = volume;
    } else {
      volumeBar.width(`${0}%`);
      volIcon = '#volume-mute';
      volSwitch = 0;
    }
    $('#audio-volume').children().first().attr('href', volIcon);
    for (let i = 0; i < audioItems.length; i++) {
      audioItems[i].volume = volSwitch;
    }
    muted = !muted;
  }

  function setVolume(e) {
    const width = this.clientWidth;
    const clickX = e.offsetX;
    volume = (clickX / width); // volume, by default normalized to 0-1
    volumeBar.width(`${volume * 100}%`);
    muted = true; // might not actually be muted, but we need to act as muted for the toggle
    toggleVolume();
    // Since we don't have a single audio item, but separate, loop through all and change their volumes
    for (let i = 0; i < audioItems.length; i++) {
      audioItems[i].volume = volume;
    }
  }

  // Update progress bar
  function updateProgress(e) {
    const { duration, currentTime } = e.target;
    const progressPercent = (currentTime / duration) * 100;
    progress.width(`${progressPercent}%`);
  }

  // Set progress bar
  function setProgress(e) {
    const width = this.clientWidth;
    const clickX = e.offsetX;
    const duration = currentAudio.duration;

    currentAudio.currentTime = (clickX / width) * duration;
  }

  //====================================================---
  // Time stuff
  //====================================================---
  function get_sec_d (x) {
    // x == duration
    let min_d = (isNaN(x) === true)? '0':
      Math.floor(x/60);
     min_d = min_d <10 ? '0'+min_d:min_d;

   let sec_d;
   if(Math.floor(x) >= 60){
     for (var i = 1; i<=60; i++){
       if(Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
         sec_d = Math.floor(x) - (60*i);
         sec_d = sec_d <10 ? '0'+sec_d:sec_d;
       }
     }
   } else{
     sec_d = (isNaN(x) === true)? '0':
     Math.floor(x);
     sec_d = sec_d <10 ? '0'+sec_d:sec_d;
    }
    return min_d +':'+ sec_d;
  }

  function updateTime (e) {
  	const {currentTime} = e.target; //get html audio api details
  	let sec;
  	// define minutes currentTime
  	let min = (currentTime==null)? 0:
  	 Math.floor(currentTime/60);
  	 min = min <10 ? '0'+min:min;

  	// define seconds currentTime
  	function get_sec (x) {
  		if(Math.floor(x) >= 60){
  			for (var i = 1; i<=60; i++){
  				if (Math.floor(x)>=(60*i) && Math.floor(x)<(60*(i+1))) {
  					sec = Math.floor(x) - (60*i);
  					sec = sec <10 ? '0'+sec:sec;
  				}
  			}
  		} else {
  		 	sec = Math.floor(x);
  		 	sec = sec <10 ? '0'+sec:sec;
  		 }
  	}
  	get_sec(currentTime,sec);

  	// change current-time DOM
  	currTime.html(min +':'+ sec);
  }
}
