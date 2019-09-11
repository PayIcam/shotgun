<div class="row">
  <div class="col-lg-12">
    <h2>A propos</h2>
    <p>Shotgun est une micro-billetterie pour les associations de l'Icam. Si vous en avez le besoin pour votre association, en tant que BDP, ou qui que ce soit d'autre, contactez nous sur <a href="mailto:contact.payicam@gmail.com">contact.payicam@gmail.com</a></p>
    <p>Le but est de proposer à la vente des places pour divers événements. Il est en fait possible de vendre n'importe quoi, et le nom de l'évènement n'est alors qu'une sorte de catégorie. Malheuresement, il n'est possible d'acheter qu'un seul article par évènement par utilisateur.</p>
    <p>Attention donc aux limitations de Shotgun ! Si vous pensez avoir besoin de mettre en ligne une billetterie poussée, un autre module est disponible, contactez nous.</p>
    <?php if (!isset($_SESSION['username'])): ?>
        <h2>Connectez vous !</h2>
        <p>Vous avez besoin de vous authentifier pour accéder au reste du site:</p>
        <p><a href="login" class="btn btn-primary">Connexion</a></p>
    <?php endif ?>
    <br>
  </div>
</div>
