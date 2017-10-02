<!-- Modal Structure -->
  <div id="login" class="grey modal">
    <div class="teal darken-1 modal-header white-text">
      <h3>Se déconnecter</h3>
      <a href="#!" class="modal-action modal-close"><i class="white-text fa fa-times fa-2x" aria-hidden="true"></i></a>
    </div>
    <div class="modal-content">
        <form class="logout" action="http://localhost/moreauandsons/controler/signin/logout_.php" method="post">
          <div class="white-text RUsure">
            Êtes-vous sûr ???
          </div>
          <span class="white btn">
            <input type="radio" name="deconnexion" value="oui" id="oui"/>
            <label class="teal-text text-darken-1" for="oui">Oui</label>
          </span>
          <span class="white btn">
            <input type="radio" name="deconnexion" value="non" id="non" />
            <label class="teal-text text-darken-1" for="non">Non</label>
          </span>
          <div style="margin-top:10px;">
            <input class="btn teal darken-1" type="submit" name="" value="Valider">
          </div>
        </form>
    </div>
  </div>
