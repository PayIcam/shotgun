<div class="alert alert-danger">Pour installer et/ou configurer Shotgun, il faut être authentifié en tant que SuperAdmin PayIcam.</div>
<div class="row">
<div class="col-md-12">
    <?php if($status->user): ?>
        <strong><?php echo $status->user_data->firstname." ".$status->user_data->lastname; ?></strong>, <br />
        Vous n'avez pas les droits suffisant pour configurer Shotgun.<br />
        <br />
        Si vous n'êtes pas <strong><?php echo $status->user_data->firstname." ".$status->user_data->lastname; ?></strong> :
        <a class="btn btn-danger" href="logout?goto=install">Déconnexion</a>
    <?php else: ?>
        Pour accéder à l'interface de configuration, vous devez vous connecter et avoir les droits "SuperUtilisateurs" sur PayIcam.<br />
        <a class="btn btn-primary pull-right" href="login?goto=install">Connexion</a>
    <?php endif; ?> 
    <br />
    <br />
</div>
</div>