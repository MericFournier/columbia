<?php get_header();?>

<?php 

if ( have_posts() ){
	while ( have_posts() ) {
		the_post();
?>

<div class="artist__hero">
   <h1><?php the_field("nom_artiste") ?></h1>
   <?php
	   	$connected = new WP_Query( array(
		  'connected_type' => 'album_to_artist',
		  'connected_items' => get_queried_object(),
		  'nopaging' => true,
		) );
		if ( $connected->have_posts() ) :
			while($connected->have_posts()):
				$connected->the_post();
   	?>
   <ul class="social">
	   <?php 
	   	  	if(get_field('facebook')):
	   ?>
	      <li>
	         <a href="<?php the_field('facebook'); ?>" target="_blank">
	            <img src="<?php echo IMG_URL."/facebook.svg"?>" class="img-responsive">
	         </a>
	      </li>
	  <?php endif; ?>
	  <?php if(get_field('chaine_youtube')):?>
      <li>
         <a href="<?php the_field('chaine_youtube'); ?>" target="_blank">
            <img src="<?php echo IMG_URL."/youtube.svg"?>" class="img-responsive">
         </a>
      </li>
 	 <?php endif; ?>
 	 <?php if(get_field('twitter')): ?>
      <li>
         <a href="<?php the_field('twitter'); ?>" target="_blank">
            <img src="<?php echo IMG_URL."/twitter.svg"?>" class="img-responsive">
         </a>
      </li>
   <?php endif; ?>
   <?php if(get_field('instagram')): ?>
      <li>
        <a href="<?php the_field('instagram'); ?>" target="_blank">
           <img src="<?php echo IMG_URL."/instagram.svg"?>" class="img-responsive">
        </a>
      </li>
   <?php endif; ?>
   </ul>
   <div class="hero__overlay"></div>
   <div class="img-responsive">
      <img src="<?php the_post_thumbnail() ?>">
   </div>
   <?php
      	endwhile;
         wp_reset_postdata();
      	endif;
      ?>
</div>

<!-- Affichage de toutes les tracks de l'album -->

<div class="player__artist">
   <div class="playerPrincipal">
      <div class="player__cover img-responsive">
         <?php the_post_thumbnail(); ?>
       </div>
      <div class="player__nav">
         <h2><?php the_title() ?></h2>
		 <a href="<?php the_field("artistes") ?>"><?php the_field("nom_artiste") ?></a>
         <p><?php the_terms( $post->ID, 'genre_album', ' ', ' / ' ); ?> - <?php the_field("date_de_sortie") ?></p>
         <ul class="player__nav__list" id="player__list">

<?php
   // Instantiate curl to get Deezer API
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_URL, 'https://api.deezer.com/album/'.get_field('id_deezer_album'));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($curl);
   curl_close($curl);

   // Json decode
   $result = json_decode($result);
   $tracks = $result -> tracks -> data;
   foreach($tracks as $track):

?>
            <li data-artist="<?php the_title() ?>" data-title="<?= $track -> title; ?>" data-src="<?= $track -> preview ?>">
               <p class="player__nav__title" ><?= $track -> title; ?></p>
               <p class="player__nav__duration"><?= ($track -> duration)/60 % 60 ?> : <?= ($track -> duration) % 60 ?></p>
               <div class="playIcon playIcon--pause"></div>
            </li>

<?php endforeach; ?>


         </ul>
      </div>
   </div>
</div>

<div class="playerMain" id="player">
   <div class="player__song__infos">
      <p id="player_data_artist">Artiste name</p>
      <p id="player_data_title">Song name</p>
   </div>
   <div class="player__song">
      <a id ="player_button" class="player__song__button"></a>
      <div class="player__song__timeline">
         <div id="player_timeline_path" class="timeline__filler">
            <div id="player_timeline_fill" class="timeline__fill"></div>
         </div>
         <div class="timeline__time">
            <p id="player_time_actual">00:00</p>
            <p id="player_time_total">03:40</p>
         </div>
      </div>
      <audio id="audio_player" autoplay="false">
         <source id="audio_src" src="mp3/musique.mp3" type="audio/mp3" />
      </audio>
   </div>
</div>





<?php
	}
}
?>

<script>

      //Player Gestion
      var player = {};
      player.section = document.querySelector('#player');
      player.audio = document.querySelector('#audio_player');
      player.src = document.querySelector('#audio_src');
      player.controls = {};
      player.controls.button = document.querySelector('#player_button');
      player.controls.timeline = {};
      player.controls.timeline.path = document.querySelector('#player_timeline_path');
      player.controls.timeline.fill = document.querySelector('#player_timeline_fill');
      player.controls.time = {};
      player.controls.time.actual = document.querySelector('#player_time_actual');
      player.controls.time.total = document.querySelector('#player_time_total');
      player.data = {};
      player.data.title = document.querySelector('#player_data_title');
      player.data.artist = document.querySelector('#player_data_artist');
      player.classnameState = ['playing'];
      player.functions = {};
      player.playerNavTitle = document.querySelectorAll('.player__nav__title');

      //handle player basics functions
      player.functions.playState = function() {
         if (player.audio.duration > 0 && !player.audio.paused) {
            player.audio.pause();
            player.controls.button.classList.remove('player__song__button--pause');
            player.controls.button.classList.add('player__song__button--play');
         } else {

            if(player.audio.readyState < 1)
               player.audio.load();
            player.audio.play();
            player.controls.button.classList.remove('player__song__button--play');
            player.controls.button.classList.add('player__song__button--pause');
         }
      }

      //timeline
      player.functions.durationState = function() {
         var setRatio = function(current,total) {
            ratio = (current/total)*100;
            ratio+=1;
            player.controls.timeline.fill.style.width = ratio+"%";
         }
         var setTime = function(duration) {
            var duree = Math.floor(duration);
            var minutes = Math.floor(duration/60);
            var secondes = Math.floor(duration%60);
            if ( secondes < 10){
               secondes = '0'+secondes;
            }
            return minutes+':'+secondes;
         }
         var current = player.audio.currentTime;
         player.controls.time.actual.innerHTML = current;
         var total = player.audio.duration;
         total = total/60;
         totalShow = total.toFixed(2);
         player.controls.time.total.innerHTML = setTime(player.audio.duration);
         setInterval(function(){
            if ( current < total && !player.audio.paused ) {
               var currentPlay = player.audio.currentTime;
               player.controls.time.actual.innerHTML = setTime(currentPlay);
               setRatio(currentPlay,player.audio.duration);
               player.controls.button.classList.remove('player__song__button--play');
               player.controls.button.classList.add('player__song__button--pause');
            } 
            else {
               player.controls.button.classList.remove('player__song__button--pause');
               player.controls.button.classList.add('player__song__button--play');
            }
         }, 100);
      }
      player.functions.select = function(data) {
         var title = data.getAttribute('data-title');
         var artist = data.getAttribute('data-artist');
         var src = data.getAttribute('data-src');
         player.controls.timeline.fill.style.width = 0+"%";
         player.data.title.innerHTML = title;
         player.data.artist.innerHTML = artist;
         player.src.src = src;
      }

      player.audio.addEventListener('loadedmetadata', function() {
         player.functions.durationState();
      });

      player.controls.timeline.path.addEventListener('click',function(e){
         var offset = this.getClientRects()[0];
         var position = (e.clientX - offset.left);
         var length = this.offsetWidth;
         var ratio = (position/length);
         var current = player.audio.duration * ratio;
         player.audio.currentTime = current;

      });

      player.controls.button.classList.add('player__song__button--play');

      player.controls.button.addEventListener('click',function(e){
         player.functions.playState();
      });


      var album = {};
      album.container = document.querySelector('#player__list');
      album.items = album.container.querySelectorAll('li');
      for ( var i = 0; i<album.items.length; i++) {
         album.items[i].addEventListener('click',function() {
            player.functions.select(this);
            this.classList.add('playing');
         })
      }
      player.functions.select(album.items[0]);

      for(let i = 0; i < player.playerNavTitle.length; i++)
      {
         player.playerNavTitle[i].addEventListener('click', function()
         {
            player.audio.load();
            player.audio.play();
         })
      }

</script>

<?php get_footer(); ?>