<?php
session_start();
error_reporting(0);
date_default_timezone_set('Australia/Melbourne');
include './Classes/Extras.class.php';
Extras::capture();
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Cache-control" content="public">
      <title>Lotto Emojis</title>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css">
      <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="./assets/css/emojis.css">
</script>
  <body id="content">
    <div id="header">
      <h1>Emoji cheat sheet</h1>
    </div>
    <h2>People</h2>
    <ul class="people emojis" id="emoji-people">
      <li><div><img src="./assets/graphics/emojis/bowtie.png"> :<span class="name">bowtie</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smile.png"> :<span class="name" data-alternative-name="happy">smile</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/laughing.png"> :<span class="name">laughing</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/blush.png"> :<span class="name">blush</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smiley.png"> :<span class="name">smiley</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/relaxed.png"> :<span class="name">relaxed</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smirk.png"> :<span class="name">smirk</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heart_eyes.png"> :<span class="name">heart_eyes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kissing_heart.png"> :<span class="name">kissing_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kissing_closed_eyes.png"> :<span class="name">kissing_closed_eyes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/flushed.png"> :<span class="name">flushed</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/relieved.png"> :<span class="name">relieved</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/satisfied.png"> :<span class="name">satisfied</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/grin.png"> :<span class="name">grin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wink.png"> :<span class="name">wink</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/stuck_out_tongue_winking_eye.png"> :<span class="name">stuck_out_tongue_winking_eye</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/stuck_out_tongue_closed_eyes.png"> :<span class="name">stuck_out_tongue_closed_eyes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/grinning.png"> :<span class="name">grinning</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kissing.png"> :<span class="name">kissing</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kissing_smiling_eyes.png"> :<span class="name">kissing_smiling_eyes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/stuck_out_tongue.png"> :<span class="name">stuck_out_tongue</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sleeping.png"> :<span class="name">sleeping</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/worried.png"> :<span class="name">worried</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/frowning.png"> :<span class="name">frowning</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/anguished.png"> :<span class="name">anguished</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/open_mouth.png"> :<span class="name">open_mouth</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/grimacing.png"> :<span class="name">grimacing</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/confused.png"> :<span class="name">confused</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hushed.png"> :<span class="name">hushed</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/expressionless.png"> :<span class="name">expressionless</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/unamused.png"> :<span class="name">unamused</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sweat_smile.png"> :<span class="name" data-alternative-name="happy, relief">sweat_smile</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sweat.png"> :<span class="name">sweat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/disappointed_relieved.png"> :<span class="name">disappointed_relieved</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/weary.png"> :<span class="name">weary</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pensive.png"> :<span class="name">pensive</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/disappointed.png"> :<span class="name">disappointed</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/confounded.png"> :<span class="name">confounded</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fearful.png"> :<span class="name">fearful</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cold_sweat.png"> :<span class="name">cold_sweat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/persevere.png"> :<span class="name">persevere</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cry.png"> :<span class="name" data-alternative-name="sad, unhappy">cry</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sob.png"> :<span class="name" data-alternative-name="sad, unhappy">sob</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/joy.png"> :<span class="name">joy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/astonished.png"> :<span class="name">astonished</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/scream.png"> :<span class="name">scream</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/neckbeard.png"> :<span class="name">neckbeard</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tired_face.png"> :<span class="name">tired_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/angry.png"> :<span class="name">angry</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rage.png"> :<span class="name">rage</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/triumph.png"> :<span class="name">triumph</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sleepy.png"> :<span class="name">sleepy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/yum.png"> :<span class="name">yum</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mask.png"> :<span class="name">mask</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sunglasses.png"> :<span class="name">sunglasses</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dizzy_face.png"> :<span class="name">dizzy_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/imp.png"> :<span class="name">imp</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smiling_imp.png"> :<span class="name">smiling_imp</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/neutral_face.png"> :<span class="name">neutral_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_mouth.png"> :<span class="name">no_mouth</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/innocent.png"> :<span class="name">innocent</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/alien.png"> :<span class="name">alien</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/yellow_heart.png"> :<span class="name">yellow_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/blue_heart.png"> :<span class="name">blue_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/purple_heart.png"> :<span class="name">purple_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heart.png"> :<span class="name">heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/green_heart.png"> :<span class="name">green_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/broken_heart.png"> :<span class="name">broken_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heartbeat.png"> :<span class="name">heartbeat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heartpulse.png"> :<span class="name">heartpulse</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/two_hearts.png"> :<span class="name">two_hearts</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/revolving_hearts.png"> :<span class="name">revolving_hearts</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cupid.png"> :<span class="name">cupid</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sparkling_heart.png"> :<span class="name">sparkling_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sparkles.png"> :<span class="name">sparkles</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/star.png"> :<span class="name">star</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/star2.png"> :<span class="name">star2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dizzy.png"> :<span class="name">dizzy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/boom.png"> :<span class="name">boom</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/collision.png"> :<span class="name">collision</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/anger.png"> :<span class="name">anger</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/exclamation.png"> :<span class="name">exclamation</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/question.png"> :<span class="name">question</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/grey_exclamation.png"> :<span class="name">grey_exclamation</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/grey_question.png"> :<span class="name">grey_question</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/zzz.png"> :<span class="name" data-alternative-name="sleep">zzz</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dash.png"> :<span class="name">dash</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sweat_drops.png"> :<span class="name" data-alternative-name="water">sweat_drops</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/notes.png"> :<span class="name">notes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/musical_note.png"> :<span class="name">musical_note</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fire.png"> :<span class="name">fire</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hankey.png"> :<span class="name">hankey</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/poop.png"> :<span class="name">poop</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shit.png"> :<span class="name">shit</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/plus1.png"> :<span class="name">+1</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/thumbsup.png"> :<span class="name">thumbsup</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/-1.png"> :<span class="name">-1</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/thumbsdown.png"> :<span class="name">thumbsdown</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ok_hand.png"> :<span class="name">ok_hand</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/punch.png"> :<span class="name">punch</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/facepunch.png"> :<span class="name">facepunch</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fist.png"> :<span class="name">fist</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/v.png"> :<span class="name">v</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wave.png"> :<span class="name">wave</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hand.png"> :<span class="name">hand</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/raised_hand.png"> :<span class="name">raised_hand</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/open_hands.png"> :<span class="name">open_hands</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/point_up.png"> :<span class="name">point_up</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/point_down.png"> :<span class="name">point_down</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/point_left.png"> :<span class="name">point_left</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/point_right.png"> :<span class="name">point_right</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/raised_hands.png"> :<span class="name">raised_hands</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pray.png"> :<span class="name">pray</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/point_up_2.png"> :<span class="name">point_up_2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clap.png"> :<span class="name">clap</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/muscle.png"> :<span class="name">muscle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/metal.png"> :<span class="name">metal</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fu.png"> :<span class="name">fu</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/runner.png"> :<span class="name">runner</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/running.png"> :<span class="name">running</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/couple.png"> :<span class="name">couple</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/family.png"> :<span class="name">family</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/two_men_holding_hands.png"> :<span class="name" data-alternative-name="gay">two_men_holding_hands</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/two_women_holding_hands.png"> :<span class="name" data-alternative-name="gay">two_women_holding_hands</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dancer.png"> :<span class="name" data-alternative-name="party">dancer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dancers.png"> :<span class="name" data-alternative-name="party">dancers</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ok_woman.png"> :<span class="name">ok_woman</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_good.png"> :<span class="name">no_good</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/information_desk_person.png"> :<span class="name">information_desk_person</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/raising_hand.png"> :<span class="name">raising_hand</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bride_with_veil.png"> :<span class="name">bride_with_veil</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/person_with_pouting_face.png"> :<span class="name">person_with_pouting_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/person_frowning.png"> :<span class="name">person_frowning</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bow.png"> :<span class="name">bow</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/couplekiss.png"> :<span class="name">couplekiss</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/couple_with_heart.png"> :<span class="name">couple_with_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/massage.png"> :<span class="name">massage</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/haircut.png"> :<span class="name">haircut</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/nail_care.png"> :<span class="name">nail_care</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/boy.png"> :<span class="name">boy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/girl.png"> :<span class="name">girl</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/woman.png"> :<span class="name">woman</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/man.png"> :<span class="name">man</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/baby.png"> :<span class="name">baby</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/older_woman.png"> :<span class="name">older_woman</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/older_man.png"> :<span class="name">older_man</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/person_with_blond_hair.png"> :<span class="name">person_with_blond_hair</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/man_with_gua_pi_mao.png"> :<span class="name">man_with_gua_pi_mao</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/man_with_turban.png"> :<span class="name">man_with_turban</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/construction_worker.png"> :<span class="name">construction_worker</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cop.png"> :<span class="name">cop</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/angel.png"> :<span class="name">angel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/princess.png"> :<span class="name">princess</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smiley_cat.png"> :<span class="name" data-alternative-name="animal, happy">smiley_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smile_cat.png"> :<span class="name" data-alternative-name="animal, happy">smile_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heart_eyes_cat.png"> :<span class="name" data-alternative-name="animal">heart_eyes_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kissing_cat.png"> :<span class="name" data-alternative-name="animal">kissing_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smirk_cat.png"> :<span class="name" data-alternative-name="animal">smirk_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/scream_cat.png"> :<span class="name" data-alternative-name="animal">scream_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/crying_cat_face.png"> :<span class="name" data-alternative-name="animal">crying_cat_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/joy_cat.png"> :<span class="name" data-alternative-name="animal">joy_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pouting_cat.png"> :<span class="name" data-alternative-name="animal">pouting_cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/japanese_ogre.png"> :<span class="name">japanese_ogre</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/japanese_goblin.png"> :<span class="name">japanese_goblin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/see_no_evil.png"> :<span class="name">see_no_evil</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hear_no_evil.png"> :<span class="name">hear_no_evil</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/speak_no_evil.png"> :<span class="name">speak_no_evil</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/guardsman.png"> :<span class="name">guardsman</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/skull.png"> :<span class="name">skull</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/feet.png"> :<span class="name">feet</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/lips.png"> :<span class="name">lips</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kiss.png"> :<span class="name">kiss</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/droplet.png"> :<span class="name" data-alternative-name="water">droplet</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ear.png"> :<span class="name">ear</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/eyes.png"> :<span class="name">eyes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/nose.png"> :<span class="name">nose</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tongue.png"> :<span class="name">tongue</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/love_letter.png"> :<span class="name">love_letter</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bust_in_silhouette.png"> :<span class="name">bust_in_silhouette</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/busts_in_silhouette.png"> :<span class="name">busts_in_silhouette</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/speech_balloon.png"> :<span class="name">speech_balloon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/thought_balloon.png"> :<span class="name">thought_balloon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/feelsgood.png"> :<span class="name">feelsgood</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/finnadie.png"> :<span class="name">finnadie</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/goberserk.png"> :<span class="name">goberserk</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/godmode.png"> :<span class="name">godmode</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hurtrealbad.png"> :<span class="name">hurtrealbad</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rage1.png"> :<span class="name">rage1</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rage2.png"> :<span class="name">rage2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rage3.png"> :<span class="name">rage3</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rage4.png"> :<span class="name">rage4</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/suspect.png"> :<span class="name">suspect</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/trollface.png"> :<span class="name">trollface</span>:</div></li>
    </ul>
    <h2>Nature</h2>
    <ul class="nature emojis" id="emoji-nature">
      <li><div><img src="./assets/graphics/emojis/sunny.png"> :<span class="name">sunny</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/umbrella.png"> :<span class="name" data-alternative-name="water, rain">umbrella</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cloud.png"> :<span class="name">cloud</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/snowflake.png"> :<span class="name">snowflake</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/snowman.png"> :<span class="name">snowman</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/zap.png"> :<span class="name">zap</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cyclone.png"> :<span class="name">cyclone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/foggy.png"> :<span class="name">foggy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ocean.png"> :<span class="name">ocean</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cat.png"> :<span class="name" data-alternative-name="animal">cat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dog.png"> :<span class="name" data-alternative-name="animal">dog</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mouse.png"> :<span class="name" data-alternative-name="animal">mouse</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hamster.png"> :<span class="name" data-alternative-name="animal">hamster</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rabbit.png"> :<span class="name" data-alternative-name="animal">rabbit</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wolf.png"> :<span class="name" data-alternative-name="animal">wolf</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/frog.png"> :<span class="name" data-alternative-name="animal">frog</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tiger.png"> :<span class="name" data-alternative-name="animal">tiger</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/koala.png"> :<span class="name" data-alternative-name="animal">koala</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bear.png"> :<span class="name" data-alternative-name="animal">bear</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pig.png"> :<span class="name" data-alternative-name="animal">pig</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pig_nose.png"> :<span class="name" data-alternative-name="animal">pig_nose</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cow.png"> :<span class="name" data-alternative-name="animal">cow</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/boar.png"> :<span class="name" data-alternative-name="animal">boar</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/monkey_face.png"> :<span class="name" data-alternative-name="animal">monkey_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/monkey.png"> :<span class="name" data-alternative-name="animal">monkey</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/horse.png"> :<span class="name" data-alternative-name="animal">horse</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/racehorse.png"> :<span class="name" data-alternative-name="animal">racehorse</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/camel.png"> :<span class="name" data-alternative-name="animal">camel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sheep.png"> :<span class="name" data-alternative-name="animal">sheep</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/elephant.png"> :<span class="name" data-alternative-name="animal">elephant</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/panda_face.png"> :<span class="name" data-alternative-name="animal">panda_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/snake.png"> :<span class="name" data-alternative-name="animal">snake</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bird.png"> :<span class="name" data-alternative-name="animal">bird</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/baby_chick.png"> :<span class="name" data-alternative-name="animal, bird">baby_chick</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hatched_chick.png"> :<span class="name" data-alternative-name="animal, bird">hatched_chick</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hatching_chick.png"> :<span class="name" data-alternative-name="animal, bird">hatching_chick</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/chicken.png"> :<span class="name" data-alternative-name="animal, bird">chicken</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/penguin.png"> :<span class="name" data-alternative-name="animal, bird">penguin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/turtle.png"> :<span class="name" data-alternative-name="animal">turtle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bug.png"> :<span class="name" data-alternative-name="animal">bug</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/honeybee.png"> :<span class="name" data-alternative-name="animal">honeybee</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ant.png"> :<span class="name" data-alternative-name="animal">ant</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/beetle.png"> :<span class="name" data-alternative-name="animal">beetle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/snail.png"> :<span class="name" data-alternative-name="animal">snail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/octopus.png"> :<span class="name" data-alternative-name="animal">octopus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tropical_fish.png"> :<span class="name" data-alternative-name="animal">tropical_fish</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fish.png"> :<span class="name" data-alternative-name="animal">fish</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/whale.png"> :<span class="name" data-alternative-name="animal">whale</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/whale2.png"> :<span class="name" data-alternative-name="animal">whale2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dolphin.png"> :<span class="name" data-alternative-name="animal">dolphin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cow2.png"> :<span class="name" data-alternative-name="animal">cow2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ram.png"> :<span class="name" data-alternative-name="animal">ram</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rat.png"> :<span class="name" data-alternative-name="animal">rat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/water_buffalo.png"> :<span class="name" data-alternative-name="animal">water_buffalo</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tiger2.png"> :<span class="name" data-alternative-name="animal">tiger2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rabbit2.png"> :<span class="name" data-alternative-name="animal">rabbit2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dragon.png"> :<span class="name" data-alternative-name="animal">dragon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/goat.png"> :<span class="name" data-alternative-name="animal">goat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rooster.png"> :<span class="name" data-alternative-name="animal">rooster</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dog2.png"> :<span class="name" data-alternative-name="animal">dog2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pig2.png"> :<span class="name" data-alternative-name="animal">pig2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mouse2.png"> :<span class="name" data-alternative-name="animal">mouse2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ox.png"> :<span class="name" data-alternative-name="animal">ox</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dragon_face.png"> :<span class="name" data-alternative-name="animal">dragon_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/blowfish.png"> :<span class="name" data-alternative-name="animal">blowfish</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/crocodile.png"> :<span class="name" data-alternative-name="animal">crocodile</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dromedary_camel.png"> :<span class="name" data-alternative-name="animal">dromedary_camel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/leopard.png"> :<span class="name" data-alternative-name="animal">leopard</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cat2.png"> :<span class="name" data-alternative-name="animal">cat2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/poodle.png"> :<span class="name" data-alternative-name="animal">poodle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/paw_prints.png"> :<span class="name" data-alternative-name="animal">paw_prints</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bouquet.png"> :<span class="name">bouquet</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cherry_blossom.png"> :<span class="name">cherry_blossom</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tulip.png"> :<span class="name">tulip</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/four_leaf_clover.png"> :<span class="name">four_leaf_clover</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rose.png"> :<span class="name">rose</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sunflower.png"> :<span class="name">sunflower</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hibiscus.png"> :<span class="name">hibiscus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/maple_leaf.png"> :<span class="name">maple_leaf</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/leaves.png"> :<span class="name">leaves</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fallen_leaf.png"> :<span class="name">fallen_leaf</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/herb.png"> :<span class="name">herb</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mushroom.png"> :<span class="name">mushroom</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cactus.png"> :<span class="name">cactus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/palm_tree.png"> :<span class="name">palm_tree</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/evergreen_tree.png"> :<span class="name">evergreen_tree</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/deciduous_tree.png"> :<span class="name">deciduous_tree</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/chestnut.png"> :<span class="name">chestnut</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/seedling.png"> :<span class="name">seedling</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/blossom.png"> :<span class="name">blossom</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ear_of_rice.png"> :<span class="name">ear_of_rice</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shell.png"> :<span class="name">shell</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/globe_with_meridians.png"> :<span class="name">globe_with_meridians</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sun_with_face.png"> :<span class="name">sun_with_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/full_moon_with_face.png"> :<span class="name">full_moon_with_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/new_moon_with_face.png"> :<span class="name">new_moon_with_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/new_moon.png"> :<span class="name">new_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/waxing_crescent_moon.png"> :<span class="name">waxing_crescent_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/first_quarter_moon.png"> :<span class="name">first_quarter_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/waxing_gibbous_moon.png"> :<span class="name">waxing_gibbous_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/full_moon.png"> :<span class="name">full_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/waning_gibbous_moon.png"> :<span class="name">waning_gibbous_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/last_quarter_moon.png"> :<span class="name">last_quarter_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/waning_crescent_moon.png"> :<span class="name">waning_crescent_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/last_quarter_moon_with_face.png"> :<span class="name">last_quarter_moon_with_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/first_quarter_moon_with_face.png"> :<span class="name">first_quarter_moon_with_face</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/crescent_moon.png"> :<span class="name">crescent_moon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/earth_africa.png"> :<span class="name" data-alternative-name="europe, emea">earth_africa</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/earth_americas.png"> :<span class="name">earth_americas</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/earth_asia.png"> :<span class="name">earth_asia</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/volcano.png"> :<span class="name">volcano</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/milky_way.png"> :<span class="name">milky_way</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/partly_sunny.png"> :<span class="name">partly_sunny</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/octocat.png"> :<span class="name" data-alternative-name="github">octocat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/squirrel.png"> :<span class="name" data-alternative-name="animal">squirrel</span>:</div></li>
    </ul>
    <h2>Objects</h2>
    <ul class="objects emojis" id="emoji-objects">
      <li><div><img src="./assets/graphics/emojis/bamboo.png"> :<span class="name">bamboo</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/gift_heart.png"> :<span class="name">gift_heart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dolls.png"> :<span class="name">dolls</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/school_satchel.png"> :<span class="name">school_satchel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mortar_board.png"> :<span class="name" data-alternative-name="edu, university">mortar_board</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/flags.png"> :<span class="name">flags</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fireworks.png"> :<span class="name">fireworks</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sparkler.png"> :<span class="name">sparkler</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wind_chime.png"> :<span class="name">wind_chime</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rice_scene.png"> :<span class="name">rice_scene</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/jack_o_lantern.png"> :<span class="name">jack_o_lantern</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ghost.png"> :<span class="name">ghost</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/santa.png"> :<span class="name" data-alternative-name="christmas">santa</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/christmas_tree.png"> :<span class="name">christmas_tree</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/gift.png"> :<span class="name">gift</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bell.png"> :<span class="name">bell</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_bell.png"> :<span class="name">no_bell</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tanabata_tree.png"> :<span class="name">tanabata_tree</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tada.png"> :<span class="name">tada</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/confetti_ball.png"> :<span class="name">confetti_ball</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/balloon.png"> :<span class="name">balloon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/crystal_ball.png"> :<span class="name">crystal_ball</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cd.png"> :<span class="name">cd</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dvd.png"> :<span class="name">dvd</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/floppy_disk.png"> :<span class="name">floppy_disk</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/camera.png"> :<span class="name">camera</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/video_camera.png"> :<span class="name">video_camera</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/movie_camera.png"> :<span class="name">movie_camera</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/computer.png"> :<span class="name">computer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tv.png"> :<span class="name">tv</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/iphone.png"> :<span class="name">iphone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/phone.png"> :<span class="name">phone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/telephone.png"> :<span class="name">telephone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/telephone_receiver.png"> :<span class="name">telephone_receiver</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pager.png"> :<span class="name">pager</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fax.png"> :<span class="name">fax</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/minidisc.png"> :<span class="name">minidisc</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/vhs.png"> :<span class="name">vhs</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sound.png"> :<span class="name">sound</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/speaker.png"> :<span class="name">speaker</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mute.png"> :<span class="name">mute</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/loudspeaker.png"> :<span class="name">loudspeaker</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mega.png"> :<span class="name">mega</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hourglass.png"> :<span class="name">hourglass</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hourglass_flowing_sand.png"> :<span class="name">hourglass_flowing_sand</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/alarm_clock.png"> :<span class="name">alarm_clock</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/watch.png"> :<span class="name" data-alternative-name="clock">watch</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/radio.png"> :<span class="name">radio</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/satellite.png"> :<span class="name">satellite</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/loop.png"> :<span class="name">loop</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mag.png"> :<span class="name" data-alternative-name="magnifying, glass">mag</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mag_right.png"> :<span class="name" data-alternative-name="magnifying, glass">mag_right</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/unlock.png"> :<span class="name">unlock</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/lock.png"> :<span class="name">lock</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/lock_with_ink_pen.png"> :<span class="name">lock_with_ink_pen</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/closed_lock_with_key.png"> :<span class="name">closed_lock_with_key</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/key.png"> :<span class="name">key</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bulb.png"> :<span class="name" data-alternative-name="light">bulb</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/flashlight.png"> :<span class="name">flashlight</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/high_brightness.png"> :<span class="name">high_brightness</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/low_brightness.png"> :<span class="name">low_brightness</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/electric_plug.png"> :<span class="name">electric_plug</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/battery.png"> :<span class="name">battery</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/calling.png"> :<span class="name">calling</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/email.png"> :<span class="name">email</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mailbox.png"> :<span class="name">mailbox</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/postbox.png"> :<span class="name">postbox</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bath.png"> :<span class="name">bath</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bathtub.png"> :<span class="name">bathtub</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shower.png"> :<span class="name" data-alternative-name="water">shower</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/toilet.png"> :<span class="name">toilet</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wrench.png"> :<span class="name" data-alternative-name="tools">wrench</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/nut_and_bolt.png"> :<span class="name" data-alternative-name="tools">nut_and_bolt</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hammer.png"> :<span class="name" data-alternative-name="tools">hammer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/seat.png"> :<span class="name">seat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/moneybag.png"> :<span class="name">moneybag</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/yen.png"> :<span class="name" data-alternative-name="money">yen</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dollar.png"> :<span class="name" data-alternative-name="money">dollar</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pound.png"> :<span class="name" data-alternative-name="money">pound</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/euro.png"> :<span class="name" data-alternative-name="money">euro</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/credit_card.png"> :<span class="name" data-alternative-name="money">credit_card</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/money_with_wings.png"> :<span class="name">money_with_wings</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/e-mail.png"> :<span class="name">e-mail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/inbox_tray.png"> :<span class="name">inbox_tray</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/outbox_tray.png"> :<span class="name">outbox_tray</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/envelope.png"> :<span class="name">envelope</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/incoming_envelope.png"> :<span class="name">incoming_envelope</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/postal_horn.png"> :<span class="name">postal_horn</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mailbox_closed.png"> :<span class="name">mailbox_closed</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mailbox_with_mail.png"> :<span class="name">mailbox_with_mail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mailbox_with_no_mail.png"> :<span class="name">mailbox_with_no_mail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/package.png"> :<span class="name" data-alternative-name="box">package</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/door.png"> :<span class="name">door</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/smoking.png"> :<span class="name">smoking</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bomb.png"> :<span class="name">bomb</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/gun.png"> :<span class="name">gun</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hocho.png"> :<span class="name">hocho</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pill.png"> :<span class="name">pill</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/syringe.png"> :<span class="name">syringe</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/page_facing_up.png"> :<span class="name">page_facing_up</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/page_with_curl.png"> :<span class="name">page_with_curl</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bookmark_tabs.png"> :<span class="name">bookmark_tabs</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bar_chart.png"> :<span class="name">bar_chart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/chart_with_upwards_trend.png"> :<span class="name">chart_with_upwards_trend</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/chart_with_downwards_trend.png"> :<span class="name">chart_with_downwards_trend</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/scroll.png"> :<span class="name">scroll</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clipboard.png"> :<span class="name">clipboard</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/calendar.png"> :<span class="name">calendar</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/date.png"> :<span class="name" data-alternative-name="calendar">date</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/card_index.png"> :<span class="name">card_index</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/file_folder.png"> :<span class="name">file_folder</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/open_file_folder.png"> :<span class="name">open_file_folder</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/scissors.png"> :<span class="name">scissors</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pushpin.png"> :<span class="name">pushpin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/paperclip.png"> :<span class="name">paperclip</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_nib.png"> :<span class="name">black_nib</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pencil2.png"> :<span class="name">pencil2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/straight_ruler.png"> :<span class="name">straight_ruler</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/triangular_ruler.png"> :<span class="name">triangular_ruler</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/closed_book.png"> :<span class="name">closed_book</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/green_book.png"> :<span class="name">green_book</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/blue_book.png"> :<span class="name">blue_book</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/orange_book.png"> :<span class="name">orange_book</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/notebook.png"> :<span class="name">notebook</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/notebook_with_decorative_cover.png"> :<span class="name">notebook_with_decorative_cover</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ledger.png"> :<span class="name">ledger</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/books.png"> :<span class="name">books</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bookmark.png"> :<span class="name">bookmark</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/name_badge.png"> :<span class="name">name_badge</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/microscope.png"> :<span class="name">microscope</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/telescope.png"> :<span class="name">telescope</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/newspaper.png"> :<span class="name">newspaper</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/football.png"> :<span class="name" data-alternative-name="sport">football</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/basketball.png"> :<span class="name" data-alternative-name="sport">basketball</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/soccer.png"> :<span class="name" data-alternative-name="sport">soccer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/baseball.png"> :<span class="name" data-alternative-name="sport">baseball</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tennis.png"> :<span class="name" data-alternative-name="sport">tennis</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/8ball.png"> :<span class="name" data-alternative-name="sport">8ball</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rugby_football.png"> :<span class="name" data-alternative-name="sport">rugby_football</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bowling.png"> :<span class="name" data-alternative-name="sport">bowling</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/golf.png"> :<span class="name" data-alternative-name="sport">golf</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mountain_bicyclist.png"> :<span class="name" data-alternative-name="sport, vehicle">mountain_bicyclist</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bicyclist.png"> :<span class="name" data-alternative-name="sport, vehicle">bicyclist</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/horse_racing.png"> :<span class="name" data-alternative-name="sport">horse_racing</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/snowboarder.png"> :<span class="name" data-alternative-name="sport">snowboarder</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/swimmer.png"> :<span class="name" data-alternative-name="sport">swimmer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/surfer.png"> :<span class="name" data-alternative-name="sport">surfer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ski.png"> :<span class="name" data-alternative-name="sport">ski</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/spades.png"> :<span class="name" data-alternative-name="cards">spades</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hearts.png"> :<span class="name" data-alternative-name="cards">hearts</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clubs.png"> :<span class="name" data-alternative-name="cards">clubs</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/diamonds.png"> :<span class="name" data-alternative-name="cards">diamonds</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/gem.png"> :<span class="name">gem</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ring.png"> :<span class="name">ring</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/trophy.png"> :<span class="name">trophy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/musical_score.png"> :<span class="name">musical_score</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/musical_keyboard.png"> :<span class="name">musical_keyboard</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/violin.png"> :<span class="name">violin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/space_invader.png"> :<span class="name">space_invader</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/video_game.png"> :<span class="name">video_game</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_joker.png"> :<span class="name">black_joker</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/flower_playing_cards.png"> :<span class="name">flower_playing_cards</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/game_die.png"> :<span class="name">game_die</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dart.png"> :<span class="name">dart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mahjong.png"> :<span class="name">mahjong</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clapper.png"> :<span class="name">clapper</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/memo.png"> :<span class="name">memo</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pencil.png"> :<span class="name">pencil</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/book.png"> :<span class="name">book</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/art.png"> :<span class="name">art</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/microphone.png"> :<span class="name">microphone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/headphones.png"> :<span class="name">headphones</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/trumpet.png"> :<span class="name">trumpet</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/saxophone.png"> :<span class="name">saxophone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/guitar.png"> :<span class="name">guitar</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shoe.png"> :<span class="name">shoe</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sandal.png"> :<span class="name">sandal</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/high_heel.png"> :<span class="name">high_heel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/lipstick.png"> :<span class="name">lipstick</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/boot.png"> :<span class="name">boot</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shirt.png"> :<span class="name">shirt</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tshirt.png"> :<span class="name">tshirt</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/necktie.png"> :<span class="name">necktie</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/womans_clothes.png"> :<span class="name">womans_clothes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dress.png"> :<span class="name">dress</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/running_shirt_with_sash.png"> :<span class="name">running_shirt_with_sash</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/jeans.png"> :<span class="name">jeans</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kimono.png"> :<span class="name">kimono</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bikini.png"> :<span class="name">bikini</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ribbon.png"> :<span class="name">ribbon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tophat.png"> :<span class="name">tophat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/crown.png"> :<span class="name">crown</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/womans_hat.png"> :<span class="name">womans_hat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mans_shoe.png"> :<span class="name">mans_shoe</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/closed_umbrella.png"> :<span class="name">closed_umbrella</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/briefcase.png"> :<span class="name">briefcase</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/handbag.png"> :<span class="name">handbag</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pouch.png"> :<span class="name">pouch</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/purse.png"> :<span class="name">purse</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/eyeglasses.png"> :<span class="name">eyeglasses</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fishing_pole_and_fish.png"> :<span class="name">fishing_pole_and_fish</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/coffee.png"> :<span class="name">coffee</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tea.png"> :<span class="name">tea</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sake.png"> :<span class="name">sake</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/baby_bottle.png"> :<span class="name">baby_bottle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/beer.png"> :<span class="name">beer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/beers.png"> :<span class="name">beers</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cocktail.png"> :<span class="name">cocktail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tropical_drink.png"> :<span class="name">tropical_drink</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wine_glass.png"> :<span class="name">wine_glass</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fork_and_knife.png"> :<span class="name">fork_and_knife</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pizza.png"> :<span class="name">pizza</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hamburger.png"> :<span class="name">hamburger</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fries.png"> :<span class="name">fries</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/poultry_leg.png"> :<span class="name">poultry_leg</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/meat_on_bone.png"> :<span class="name">meat_on_bone</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/spaghetti.png"> :<span class="name">spaghetti</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/curry.png"> :<span class="name">curry</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fried_shrimp.png"> :<span class="name">fried_shrimp</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bento.png"> :<span class="name">bento</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sushi.png"> :<span class="name">sushi</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fish_cake.png"> :<span class="name">fish_cake</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rice_ball.png"> :<span class="name">rice_ball</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rice_cracker.png"> :<span class="name">rice_cracker</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rice.png"> :<span class="name">rice</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ramen.png"> :<span class="name">ramen</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/stew.png"> :<span class="name">stew</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/oden.png"> :<span class="name">oden</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/dango.png"> :<span class="name">dango</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/egg.png"> :<span class="name">egg</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bread.png"> :<span class="name">bread</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/doughnut.png"> :<span class="name">doughnut</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/custard.png"> :<span class="name">custard</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/icecream.png"> :<span class="name">icecream</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ice_cream.png"> :<span class="name">ice_cream</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shaved_ice.png"> :<span class="name">shaved_ice</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/birthday.png"> :<span class="name">birthday</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cake.png"> :<span class="name">cake</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cookie.png"> :<span class="name">cookie</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/chocolate_bar.png"> :<span class="name">chocolate_bar</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/candy.png"> :<span class="name">candy</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/lollipop.png"> :<span class="name">lollipop</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/honey_pot.png"> :<span class="name">honey_pot</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/apple.png"> :<span class="name">apple</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/green_apple.png"> :<span class="name">green_apple</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tangerine.png"> :<span class="name">tangerine</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/lemon.png"> :<span class="name">lemon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cherries.png"> :<span class="name">cherries</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/grapes.png"> :<span class="name">grapes</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/watermelon.png"> :<span class="name">watermelon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/strawberry.png"> :<span class="name">strawberry</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/peach.png"> :<span class="name">peach</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/melon.png"> :<span class="name">melon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/banana.png"> :<span class="name">banana</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pear.png"> :<span class="name">pear</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pineapple.png"> :<span class="name">pineapple</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sweet_potato.png"> :<span class="name">sweet_potato</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/eggplant.png"> :<span class="name">eggplant</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tomato.png"> :<span class="name">tomato</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/corn.png"> :<span class="name">corn</span>:</div></li>
    </ul>
    <h2>Places</h2>
    <ul class="places emojis" id="emoji-places">
      <li><div><img src="./assets/graphics/emojis/house.png"> :<span class="name">house</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/house_with_garden.png"> :<span class="name">house_with_garden</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/school.png"> :<span class="name">school</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/office.png"> :<span class="name">office</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/post_office.png"> :<span class="name">post_office</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hospital.png"> :<span class="name">hospital</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bank.png"> :<span class="name">bank</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/convenience_store.png"> :<span class="name">convenience_store</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/love_hotel.png"> :<span class="name">love_hotel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hotel.png"> :<span class="name">hotel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wedding.png"> :<span class="name">wedding</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/church.png"> :<span class="name">church</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/department_store.png"> :<span class="name">department_store</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/european_post_office.png"> :<span class="name">european_post_office</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/city_sunrise.png"> :<span class="name">city_sunrise</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/city_sunset.png"> :<span class="name">city_sunset</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/japanese_castle.png"> :<span class="name">japanese_castle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/european_castle.png"> :<span class="name">european_castle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tent.png"> :<span class="name">tent</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/factory.png"> :<span class="name">factory</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tokyo_tower.png"> :<span class="name">tokyo_tower</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/japan.png"> :<span class="name">japan</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mount_fuji.png"> :<span class="name">mount_fuji</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sunrise_over_mountains.png"> :<span class="name">sunrise_over_mountains</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sunrise.png"> :<span class="name">sunrise</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/stars.png"> :<span class="name">stars</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/statue_of_liberty.png"> :<span class="name">statue_of_liberty</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bridge_at_night.png"> :<span class="name">bridge_at_night</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/carousel_horse.png"> :<span class="name">carousel_horse</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rainbow.png"> :<span class="name">rainbow</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ferris_wheel.png"> :<span class="name">ferris_wheel</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fountain.png"> :<span class="name">fountain</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/roller_coaster.png"> :<span class="name">roller_coaster</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ship.png"> :<span class="name" data-alternative-name="vehicle">ship</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/speedboat.png"> :<span class="name" data-alternative-name="vehicle">speedboat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/boat.png"> :<span class="name" data-alternative-name="vehicle">boat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sailboat.png"> :<span class="name" data-alternative-name="vehicle">sailboat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rowboat.png"> :<span class="name" data-alternative-name="vehicle">rowboat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/anchor.png"> :<span class="name">anchor</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rocket.png"> :<span class="name">rocket</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/airplane.png"> :<span class="name" data-alternative-name="vehicle">airplane</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/helicopter.png"> :<span class="name" data-alternative-name="vehicle">helicopter</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/steam_locomotive.png"> :<span class="name" data-alternative-name="vehicle">steam_locomotive</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tram.png"> :<span class="name" data-alternative-name="vehicle">tram</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mountain_railway.png"> :<span class="name" data-alternative-name="vehicle">mountain_railway</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bike.png"> :<span class="name" data-alternative-name="vehicle">bike</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/aerial_tramway.png"> :<span class="name" data-alternative-name="vehicle">aerial_tramway</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/suspension_railway.png"> :<span class="name" data-alternative-name="vehicle">suspension_railway</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mountain_cableway.png"> :<span class="name" data-alternative-name="vehicle">mountain_cableway</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tractor.png"> :<span class="name" data-alternative-name="vehicle">tractor</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/blue_car.png"> :<span class="name" data-alternative-name="vehicle">blue_car</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/oncoming_automobile.png"> :<span class="name" data-alternative-name="vehicle">oncoming_automobile</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/car.png"> :<span class="name" data-alternative-name="vehicle">car</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/red_car.png"> :<span class="name" data-alternative-name="vehicle">red_car</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/taxi.png"> :<span class="name" data-alternative-name="vehicle">taxi</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/oncoming_taxi.png"> :<span class="name" data-alternative-name="vehicle">oncoming_taxi</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/articulated_lorry.png"> :<span class="name" data-alternative-name="vehicle">articulated_lorry</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bus.png"> :<span class="name" data-alternative-name="vehicle">bus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/oncoming_bus.png"> :<span class="name" data-alternative-name="vehicle">oncoming_bus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rotating_light.png"> :<span class="name">rotating_light</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/police_car.png"> :<span class="name" data-alternative-name="vehicle">police_car</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/oncoming_police_car.png"> :<span class="name" data-alternative-name="vehicle">oncoming_police_car</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fire_engine.png"> :<span class="name" data-alternative-name="vehicle">fire_engine</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ambulance.png"> :<span class="name" data-alternative-name="vehicle">ambulance</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/minibus.png"> :<span class="name" data-alternative-name="vehicle">minibus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/truck.png"> :<span class="name" data-alternative-name="vehicle">truck</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/train.png"> :<span class="name" data-alternative-name="vehicle">train</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/station.png"> :<span class="name">station</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/train2.png"> :<span class="name" data-alternative-name="vehicle">train2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bullettrain_front.png"> :<span class="name" data-alternative-name="vehicle">bullettrain_front</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bullettrain_side.png"> :<span class="name" data-alternative-name="vehicle">bullettrain_side</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/light_rail.png"> :<span class="name" data-alternative-name="vehicle">light_rail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/monorail.png"> :<span class="name" data-alternative-name="vehicle">monorail</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/railway_car.png"> :<span class="name" data-alternative-name="vehicle">railway_car</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/trolleybus.png"> :<span class="name" data-alternative-name="vehicle">trolleybus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ticket.png"> :<span class="name">ticket</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fuelpump.png"> :<span class="name">fuelpump</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/vertical_traffic_light.png"> :<span class="name">vertical_traffic_light</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/traffic_light.png"> :<span class="name">traffic_light</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/warning.png"> :<span class="name">warning</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/construction.png"> :<span class="name">construction</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/beginner.png"> :<span class="name">beginner</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/atm.png"> :<span class="name">atm</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/slot_machine.png"> :<span class="name">slot_machine</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/busstop.png"> :<span class="name">busstop</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/barber.png"> :<span class="name">barber</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hotsprings.png"> :<span class="name">hotsprings</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/checkered_flag.png"> :<span class="name">checkered_flag</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/crossed_flags.png"> :<span class="name">crossed_flags</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/izakaya_lantern.png"> :<span class="name">izakaya_lantern</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/moyai.png"> :<span class="name">moyai</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/circus_tent.png"> :<span class="name">circus_tent</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/performing_arts.png"> :<span class="name">performing_arts</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/round_pushpin.png"> :<span class="name">round_pushpin</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/triangular_flag_on_post.png"> :<span class="name">triangular_flag_on_post</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/jp.png"> :<span class="name" data-alternative-name="japan, nippon, nihon">jp</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/kr.png"> :<span class="name" data-alternative-name="korea, hanguk">kr</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cn.png"> :<span class="name" data-alternative-name="china, prc">cn</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/us.png"> :<span class="name" data-alternative-name="usa, america, united states">us</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fr.png"> :<span class="name" data-alternative-name="france">fr</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/es.png"> :<span class="name" data-alternative-name="spain, espana">es</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/it.png"> :<span class="name" data-alternative-name="italy, italia">it</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ru.png"> :<span class="name" data-alternative-name="russia">ru</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/gb.png"> :<span class="name" data-alternative-name="great britain, united kingdom">gb</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/uk.png"> :<span class="name" data-alternative-name="great britain, united kingdom">uk</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/de.png"> :<span class="name" data-alternative-name="germany, deutschland">de</span>:</div></li>
    </ul>
    <h2>Symbols</h2>
    <ul class="symbols emojis" id="emoji-symbols">
      <li><div><img src="./assets/graphics/emojis/one.png"> :<span class="name" data-alternative-name="1">one</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/two.png"> :<span class="name" data-alternative-name="2">two</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/three.png"> :<span class="name" data-alternative-name="3">three</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/four.png"> :<span class="name" data-alternative-name="4">four</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/five.png"> :<span class="name" data-alternative-name="5">five</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/six.png"> :<span class="name" data-alternative-name="6">six</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/seven.png"> :<span class="name" data-alternative-name="7">seven</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/eight.png"> :<span class="name" data-alternative-name="8">eight</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/nine.png"> :<span class="name" data-alternative-name="9">nine</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/keycap_ten.png"> :<span class="name" data-alternative-name="10">keycap_ten</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/1234.png"> :<span class="name">1234</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/zero.png"> :<span class="name">zero</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/hash.png"> :<span class="name">hash</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/symbols.png"> :<span class="name">symbols</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_backward.png"> :<span class="name" data-alternative-name="left">arrow_backward</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_down.png"> :<span class="name">arrow_down</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_forward.png"> :<span class="name" data-alternative-name="right">arrow_forward</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_left.png"> :<span class="name">arrow_left</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/capital_abcd.png"> :<span class="name">capital_abcd</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/abcd.png"> :<span class="name">abcd</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/abc.png"> :<span class="name">abc</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_lower_left.png"> :<span class="name">arrow_lower_left</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_lower_right.png"> :<span class="name">arrow_lower_right</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_right.png"> :<span class="name">arrow_right</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_up.png"> :<span class="name">arrow_up</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_upper_left.png"> :<span class="name">arrow_upper_left</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_upper_right.png"> :<span class="name">arrow_upper_right</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_double_down.png"> :<span class="name">arrow_double_down</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_double_up.png"> :<span class="name">arrow_double_up</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_down_small.png"> :<span class="name">arrow_down_small</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_heading_down.png"> :<span class="name">arrow_heading_down</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_heading_up.png"> :<span class="name">arrow_heading_up</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/leftwards_arrow_with_hook.png"> :<span class="name">leftwards_arrow_with_hook</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_right_hook.png"> :<span class="name">arrow_right_hook</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/left_right_arrow.png"> :<span class="name">left_right_arrow</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_up_down.png"> :<span class="name">arrow_up_down</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrow_up_small.png"> :<span class="name">arrow_up_small</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrows_clockwise.png"> :<span class="name">arrows_clockwise</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/arrows_counterclockwise.png"> :<span class="name">arrows_counterclockwise</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/rewind.png"> :<span class="name">rewind</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/fast_forward.png"> :<span class="name">fast_forward</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/information_source.png"> :<span class="name">information_source</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ok.png"> :<span class="name">ok</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/twisted_rightwards_arrows.png"> :<span class="name">twisted_rightwards_arrows</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/repeat.png"> :<span class="name">repeat</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/repeat_one.png"> :<span class="name">repeat_one</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/new.png"> :<span class="name">new</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/top.png"> :<span class="name">top</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/up.png"> :<span class="name">up</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cool.png"> :<span class="name">cool</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/free.png"> :<span class="name">free</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ng.png"> :<span class="name">ng</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cinema.png"> :<span class="name" data-alternative-name="movie">cinema</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/koko.png"> :<span class="name">koko</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/signal_strength.png"> :<span class="name">signal_strength</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u5272.png"> :<span class="name">u5272</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u5408.png"> :<span class="name">u5408</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u55b6.png"> :<span class="name">u55b6</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u6307.png"> :<span class="name">u6307</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u6708.png"> :<span class="name">u6708</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u6709.png"> :<span class="name">u6709</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u6e80.png"> :<span class="name">u6e80</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u7121.png"> :<span class="name">u7121</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u7533.png"> :<span class="name">u7533</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u7a7a.png"> :<span class="name">u7a7a</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/u7981.png"> :<span class="name">u7981</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sa.png"> :<span class="name">sa</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/restroom.png"> :<span class="name">restroom</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mens.png"> :<span class="name">mens</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/womens.png"> :<span class="name">womens</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/baby_symbol.png"> :<span class="name">baby_symbol</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_smoking.png"> :<span class="name">no_smoking</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/parking.png"> :<span class="name">parking</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wheelchair.png"> :<span class="name">wheelchair</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/metro.png"> :<span class="name">metro</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/baggage_claim.png"> :<span class="name">baggage_claim</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/accept.png"> :<span class="name">accept</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wc.png"> :<span class="name">wc</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/potable_water.png"> :<span class="name">potable_water</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/put_litter_in_its_place.png"> :<span class="name">put_litter_in_its_place</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/secret.png"> :<span class="name">secret</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/congratulations.png"> :<span class="name">congratulations</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/m.png"> :<span class="name">m</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/passport_control.png"> :<span class="name">passport_control</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/left_luggage.png"> :<span class="name">left_luggage</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/customs.png"> :<span class="name">customs</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ideograph_advantage.png"> :<span class="name">ideograph_advantage</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cl.png"> :<span class="name">cl</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sos.png"> :<span class="name">sos</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/id.png"> :<span class="name">id</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_entry_sign.png"> :<span class="name">no_entry_sign</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/underage.png"> :<span class="name">underage</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_mobile_phones.png"> :<span class="name">no_mobile_phones</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/do_not_litter.png"> :<span class="name">do_not_litter</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/non-potable_water.png"> :<span class="name">non-potable_water</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_bicycles.png"> :<span class="name">no_bicycles</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_pedestrians.png"> :<span class="name">no_pedestrians</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/children_crossing.png"> :<span class="name">children_crossing</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/no_entry.png"> :<span class="name">no_entry</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/eight_spoked_asterisk.png"> :<span class="name">eight_spoked_asterisk</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sparkle.png"> :<span class="name">sparkle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/eight_pointed_black_star.png"> :<span class="name">eight_pointed_black_star</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heart_decoration.png"> :<span class="name">heart_decoration</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/vs.png"> :<span class="name">vs</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/vibration_mode.png"> :<span class="name">vibration_mode</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/mobile_phone_off.png"> :<span class="name">mobile_phone_off</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/chart.png"> :<span class="name" data-alternative-name="yen">chart</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/currency_exchange.png"> :<span class="name">currency_exchange</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/aries.png"> :<span class="name">aries</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/taurus.png"> :<span class="name">taurus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/gemini.png"> :<span class="name">gemini</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/cancer.png"> :<span class="name">cancer</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/leo.png"> :<span class="name">leo</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/virgo.png"> :<span class="name">virgo</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/libra.png"> :<span class="name">libra</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/scorpius.png"> :<span class="name">scorpius</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/sagittarius.png"> :<span class="name">sagittarius</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/capricorn.png"> :<span class="name">capricorn</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/aquarius.png"> :<span class="name">aquarius</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/pisces.png"> :<span class="name">pisces</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ophiuchus.png"> :<span class="name">ophiuchus</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/six_pointed_star.png"> :<span class="name">six_pointed_star</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/negative_squared_cross_mark.png"> :<span class="name">negative_squared_cross_mark</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/a.png"> :<span class="name">a</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/b.png"> :<span class="name">b</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ab.png"> :<span class="name">ab</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/o2.png"> :<span class="name">o2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/diamond_shape_with_a_dot_inside.png"> :<span class="name">diamond_shape_with_a_dot_inside</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/recycle.png"> :<span class="name">recycle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/end.png"> :<span class="name">end</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/back.png"> :<span class="name">back</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/on.png"> :<span class="name">on</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/soon.png"> :<span class="name">soon</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock1.png"> :<span class="name">clock1</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock130.png"> :<span class="name">clock130</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock10.png"> :<span class="name">clock10</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock1030.png"> :<span class="name">clock1030</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock11.png"> :<span class="name">clock11</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock1130.png"> :<span class="name">clock1130</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock12.png"> :<span class="name" data-alternative-name="midnight, noon">clock12</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock1230.png"> :<span class="name">clock1230</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock2.png"> :<span class="name">clock2</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock230.png"> :<span class="name">clock230</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock3.png"> :<span class="name">clock3</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock330.png"> :<span class="name">clock330</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock4.png"> :<span class="name">clock4</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock430.png"> :<span class="name">clock430</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock5.png"> :<span class="name">clock5</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock530.png"> :<span class="name">clock530</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock6.png"> :<span class="name">clock6</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock630.png"> :<span class="name">clock630</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock7.png"> :<span class="name">clock7</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock730.png"> :<span class="name">clock730</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock8.png"> :<span class="name">clock8</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock830.png"> :<span class="name">clock830</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock9.png"> :<span class="name">clock9</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/clock930.png"> :<span class="name">clock930</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_dollar_sign.png"> :<span class="name">heavy_dollar_sign</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/copyright.png"> :<span class="name">copyright</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/registered.png"> :<span class="name">registered</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/tm.png"> :<span class="name">tm</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/x.png"> :<span class="name">x</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_exclamation_mark.png"> :<span class="name">heavy_exclamation_mark</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/bangbang.png"> :<span class="name">bangbang</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/interrobang.png"> :<span class="name">interrobang</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/o.png"> :<span class="name">o</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_multiplication_x.png"> :<span class="name">heavy_multiplication_x</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_plus_sign.png"> :<span class="name">heavy_plus_sign</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_minus_sign.png"> :<span class="name">heavy_minus_sign</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_division_sign.png"> :<span class="name">heavy_division_sign</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_flower.png"> :<span class="name">white_flower</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/100.png"> :<span class="name">100</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/heavy_check_mark.png"> :<span class="name">heavy_check_mark</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/ballot_box_with_check.png"> :<span class="name">ballot_box_with_check</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/radio_button.png"> :<span class="name">radio_button</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/link.png"> :<span class="name">link</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/curly_loop.png"> :<span class="name">curly_loop</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/wavy_dash.png"> :<span class="name">wavy_dash</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/part_alternation_mark.png"> :<span class="name">part_alternation_mark</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/trident.png"> :<span class="name">trident</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_small_square.png"> :<span class="name">black_small_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_small_square.png"> :<span class="name">white_small_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_medium_small_square.png"> :<span class="name">black_medium_small_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_medium_small_square.png"> :<span class="name">white_medium_small_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_medium_square.png"> :<span class="name">black_medium_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_medium_square.png"> :<span class="name">white_medium_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_square.png"> :<span class="name">black_large_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_large_square.png"> :<span class="name">white_large_square</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_check_mark.png"> :<span class="name">white_check_mark</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_square_button.png"> :<span class="name">black_square_button</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_square_button.png"> :<span class="name">white_square_button</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/black_circle.png"> :<span class="name">black_circle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/white_circle.png"> :<span class="name">white_circle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/red_circle.png"> :<span class="name">red_circle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/large_blue_circle.png"> :<span class="name">large_blue_circle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/large_blue_diamond.png"> :<span class="name">large_blue_diamond</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/large_orange_diamond.png"> :<span class="name">large_orange_diamond</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/small_blue_diamond.png"> :<span class="name">small_blue_diamond</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/small_orange_diamond.png"> :<span class="name">small_orange_diamond</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/small_red_triangle.png"> :<span class="name">small_red_triangle</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/small_red_triangle_down.png"> :<span class="name">small_red_triangle_down</span>:</div></li>
      <li><div><img src="./assets/graphics/emojis/shipit.png"> :<span class="name">shipit</span>:</div></li>
    </ul>
  </body>
</html>