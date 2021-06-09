<?php
$heading = get_field('heading');
$audio_items = get_field('audio_items');
?>

<svg width="0" height="0" class="hidden">
<path id="play-path" d="M191.068 1720.265l-6.738-4.919a3.533 3.533 0 00-5.618 2.834v9.841a3.533 3.533 0 005.62 2.833l6.738-4.92a3.5 3.5 0 000-5.668zm-.836 4.534l-6.738 4.92a2.12 2.12 0 01-3.369-1.7v-9.839a2.071 2.071 0 011.159-1.878 2.14 2.14 0 01.964-.231 2.1 2.1 0 011.246.414l6.738 4.92a2.1 2.1 0 010 3.4z"></path>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.301 23" id="pause">
  <path d="M3.079 0A3.226 3.226 0 000 3.354v16.292A3.226 3.226 0 003.079 23a3.226 3.226 0 003.079-3.354V3.354A3.226 3.226 0 003.079 0zM4.4 19.646a1.382 1.382 0 01-1.32 1.438 1.382 1.382 0 01-1.32-1.437V3.354a1.382 1.382 0 011.32-1.437A1.382 1.382 0 014.4 3.354zM13.221 0a3.226 3.226 0 00-3.079 3.354v16.292A3.226 3.226 0 0013.221 23a3.226 3.226 0 003.079-3.354V3.354A3.226 3.226 0 0013.221 0zm1.321 19.646a1.325 1.325 0 11-2.639 0V3.354a1.325 1.325 0 112.639 0z"></path></symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.078 17.434" id="prev">
    <path d="M20.278 17.434a3.809 3.809 0 003.8-3.813v-9.81A3.8 3.8 0 0018.036.738l-3.792 2.794A3.794 3.794 0 008.214.738L1.55 5.643a3.82 3.82 0 000 6.144l6.664 4.9a3.794 3.794 0 006.031-2.792l3.792 2.794a3.779 3.779 0 002.241.745zm-7.03-6.521a1 1 0 00-1 1.007v1.7A1.79 1.79 0 019.4 15.069l-6.663-4.9a1.8 1.8 0 010-2.9L9.4 2.363a1.79 1.79 0 012.848 1.448v1.7a1 1 0 001.6.812l5.383-3.961a1.79 1.79 0 012.848 1.448v9.81a1.79 1.79 0 01-2.848 1.448l-5.381-3.961a1 1 0 00-.602-.194z"></path>
    </symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 18" id="play-main">
  <use href="#play-path" transform="translate(-179 -1714)"></use></symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="play">
  <g transform="translate(-169 -1707)">
    <circle cx="16" cy="16" r="16" transform="translate(169 1707)" fill="#f8c0c9"></circle>
    <use href="#play-path" fill="#3d3d3d"></use>
  </g></symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 62" id="audiocon">
  <g transform="translate(-605 -271)">
    <circle cx="31" cy="31" r="31" transform="translate(605 271)" fill="#f8c0c9"></circle>
    <path d="M646.469 293.545a1.116 1.116 0 00-1.567 0 1.089 1.089 0 000 1.552 9.7 9.7 0 010 13.8 1.089 1.089 0 000 1.552 1.116 1.116 0 001.567 0 11.883 11.883 0 000-16.908z"></path>
    <path d="M643.389 296.784a1.11 1.11 0 00-1.574 1.567 5.164 5.164 0 010 7.3 1.11 1.11 0 001.573 1.567 7.384 7.384 0 000-10.433zm-5.079-7.767a13.363 13.363 0 00-8.368 5.282h-1.4a5.529 5.529 0 00-5.541 5.501v4.4a5.529 5.529 0 005.539 5.5h1.4a13.369 13.369 0 008.368 5.281 1.023 1.023 0 00.2.019 1.1 1.1 0 001.108-1.1v-23.797a1.1 1.1 0 00-.4-.847 1.113 1.113 0 00-.906-.239zm-.909 23.473a11.161 11.161 0 01-5.95-4.489 1.11 1.11 0 00-.927-.5h-1.984a3.312 3.312 0 01-3.323-3.3v-4.4a3.312 3.312 0 013.323-3.3h1.994a1.11 1.11 0 00.927-.5 11.156 11.156 0 015.94-4.491z"></path>
  </g></symbol>

<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" id="volume">
  <g id="volume-path"><path d="M22.528 4.477a1.078 1.078 0 00-1.541 0 1.118 1.118 0 000 1.564 9.959 9.959 0 010 13.918 1.118 1.118 0 000 1.564 1.078 1.078 0 001.541 0 12.2 12.2 0 000-17.046z"></path>
  <path d="M19.605 7.872a1.092 1.092 0 00-1.546 1.541 5.077 5.077 0 010 7.174 1.092 1.092 0 101.546 1.541 7.259 7.259 0 000-10.256zM15.05.017a13.113 13.113 0 00-8.226 5.282H5.445A5.482 5.482 0 000 10.8v4.4a5.482 5.482 0 005.445 5.5h1.379a13.118 13.118 0 008.226 5.281.989.989 0 00.2.019 1.1 1.1 0 001.089-1.1V1.103a1.1 1.1 0 00-.391-.847 1.081 1.081 0 00-.898-.239zm-.893 23.471a10.994 10.994 0 01-5.849-4.489 1.086 1.086 0 00-.911-.5H5.445a3.284 3.284 0 01-3.267-3.3v-4.4a3.284 3.284 0 013.267-3.3h1.96a1.086 1.086 0 00.911-.5 10.989 10.989 0 015.84-4.491z"></path></g></symbol>
<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" id="volume-mute">
  <use href="#volume-path"></use><line x1='0' y1='0' x2='26' y2='26' stroke-width='2' stroke="#413E6B"/></symbol>
</svg>

<div class="container relative audio-container">
  <div class="title-box text-center mb-5">
    <svg class="icon mb-4" width="62" height="62"><use href="#audiocon"></use></svg>
    <h3 class="cover-title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h3>
  </div>
  <div class="audio-items mb-5">
    <?php foreach ($audio_items as $item): ?>
    <div class="audio-item">
    <svg class="icon" width="32" height="32"><use href="#play"></use></svg>
    <span class="w-100"><?= esc_html__( $item['name'], PANDAGO_TD ); ?></span>
    </div>
    <audio class="audio-player" src="<?= $item['file']['url']; ?>" preload="metadata"></audio>
    <?php endforeach; ?>
  </div>
  <div class="audio-navigation">
    <div class="audio-controls text-center">
      <svg class="icon-prev" id="audio-prev" width="24" height="17"><use href="#prev"></use></svg>
      <svg class="icon-play" id="audio-play" width="20" height="24"><use href="#play-main"></use></svg>
      <svg class="icon-pause" id="audio-pause" width="20" height="24"><use href="#pause"></use></svg>
      <svg class="icon-next flip" id="audio-next" width="24" height="17"><use href="#prev"></use></svg>
    </div>
    <div class="audio-path">
      <time id="current-duration">00:00</time>
      <div class="progress-container" id="progress-container">
        <div class="progress" id="progress"></div>
      </div>
      <time id="total-duration"></time>
    </div>
    <div class="volume-control">
      <svg class="icon icon-volume" id="audio-volume" width="26" height="26"><use href="#volume"></use></svg>
      <div class="progress-container volume-bar" id="volume-container">
        <div class="progress" id="volume-level"></div>
      </div>
    </div>
  </div>
</div>