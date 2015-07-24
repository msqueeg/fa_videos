<?php
/* example stuff */
?>
<div id="wistia_1d35830d05" class="wistia_embed" style="width:640px;height:503px;" data-video-width="640" data-video-height="360"> </div>
      <script charset="ISO-8859-1" src="http://fast.wistia.com/static/concat/E-v1%2Cplaylist-v1%2Cplaylist-v1-bento.js"></script>
      <script>
      wistiaPlaylist = Wistia.playlist("1d35830d05", {
        version: "v1",
        theme: "bento",
        videoOptions: {
          autoPlay: false,
          videoWidth: 640,
          videoHeight: 360
        },
        media_0_0: {
          autoPlay: false,
          controlsVisibleOnLoad: false
        },
        bento: {
          menuPosition: "bottom"
        }
      });

      function playlist_section_count(playlist) {
        var section_inc = 0;

        playlist.eachSection( function() {
          section_inc += 1;
        })
        return section_inc;
      };

      function choose_a_video(playlist, section) {
        var video_index = 0;

        video_index = playlist.sectionData(section).medias.length;

        return rand(video_index); 
      }

      function rand(num) {
        return Math.floor(Math.random() * num);
      };

      wistiaPlaylist.ready( function() {
        var rand_section = rand(playlist_section_count(wistiaPlaylist)),
          rand_video = choose_a_video(wistiaPlaylist, rand_section);
        wistiaPlaylist.embed( rand_section, rand_video );
        wistiaPlaylist.bind('end', function() {
          wistiaPlaylist.embed( rand_section, rand_video );
        });
      });
      </script>