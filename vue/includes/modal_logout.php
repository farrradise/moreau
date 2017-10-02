<!-- Modal Structure -->
  <div id="login" class="grey modal">
    <div class="modal-content">
      <h4>Se déconnecter</h4>

        <form class="logout" action="http://localhost/moreauandsons/controler/signin/logout_.php" method="post">
          <div class="">
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
          <div>
            <input class="btn teal darken-1" type="submit" name="" value="Valider">
          </div>
        </form>
      <a href="#!" class="modal-action modal-close"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
    </div>
  </div>
