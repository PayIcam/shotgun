<div class="jumbotron">
<h1><?php echo $title; ?></h1>
<p class="lead">Bienvenue sur la microbilletterie de l'Icam.</p>
<p>Vous trouverez ci-dessous la liste des shotguns à venir.</p>
</div>

<div class="row marketing">
<div class="col-lg-12">
  <?php $shotgunAffiches=0; $i = 0; foreach($shotguns as $shotgun):
    if(!user_is_targetted($user, $shotgun)){
        continue;
    } $shotgunAffiches += 1; ?>
  <h4><?php echo $shotgun->titre; ?></h4>
  <?php echo nl2br($shotgun->desc); ?>
  <a href="shotgun?id=<?php echo $shotgun->id; ?>" class="btn btn-primary pull-right">Accéder à l'événement</a><br /><br />
  <?php
  	$debut = new DateTime($shotgun->debut);
  	$fin = new DateTime($shotgun->fin);
  	$now = new DateTime("NOW");
  	$diff = $now->diff($debut);
  	if($diff->invert) {
  		if($now->diff($fin)->invert) {
  			echo "Vente terminée.";
  		} else {
  			echo "Vente en cours !";
  		}
  	} else {
  		$i+=1;
  		echo "Ouverture dans : ";
  		echo '<div id="Countdown'.$i.'"></div>';
  		echo '<script> var c'.$i.' = '. (((($diff->d * 24 + $diff->h) * 60) + $diff->i) * 60 + $diff->s) . '; </script>';
  	}
  ?><br /><br /><hr />

  <?php endforeach; ?>
  <?php if($shotgunAffiches == 0): ?>
    <h4>Il n'y a aucun shotgun à afficher, reviens plus tard... </h4>
  <?php endif; ?>
</div>
</div>