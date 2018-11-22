<div class="row">
  <div class="col-lg-12">
    <h2>A propos</h2>
    <p>Shotgun est une micro-billetterie pour les associations de l'Icam. Si vous en avez le besoin pour votre association, en tant que BDP, ou quoi que ce soit d'autre, écrivez nous sur <a href="mailto:contact.payicam@gmail.com">contact.payicam@gmail.com</a></p>
    <p>Le but est de proposer à la vente des places pour divers événements. Il est en fait possible de vendre n'importe quoi, et le nom de l'"évènement" n'est alors qu'une sorte de catégorie.
    <br>Ceux-ci nécessitent qu'un utilisateur n'achète qu'une et une seule place.</p>
    ShotgunUTC a été créé par <a href="https://github.com/mattgu74/shotgunutc">Matthieu Guffroy</a> pour l'UTC de Compiègne.<br>Le projet a été adapté par Antoine Giraud (115) pour les besoins de PayIcam pour le site de Lille en Janvier 2016. Jusqu'en Mars 2018, rien n'a bougé, puis des bugs ont été résolus, et des améliorations ont été faites, notamment depuis début Octobre.</p>
    <?php if (!isset($_SESSION['username'])): ?>
        <h2>Connectez vous !</h2>
        <p>Vous avez besoin de vous authentifier pour accéder au reste du site:</p>
        <p><a href="login" class="btn btn-primary">Connexion</a></p>
    <?php endif ?>
    <br>
  </div>
</div>
