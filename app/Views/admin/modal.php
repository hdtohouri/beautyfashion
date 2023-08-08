<!-- Modal 1 Desactiver ce compte-->
<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Souhaitez vous désactiver ce compte ?
          <h6>Cliquer Sur enregistrer pour le desactiver ou sur fermer pour annuler</h6>
      </div>
      <div class="modal-footer">
        <form class="user" method="post" action="<?php echo base_url('common/admindashboard/list_user'); ?>">
          <div class="mb-4 form-group">
            <input type="hidden" name="user_id" value="<?= session('selected_user_id') ?>">
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <input type="submit" class="btn btn-primary btn-user btn-block" value="Enregistrer"/>
       </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2 Activer ce compte-->
<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Souhaitez vous activer ce compte ?
          <h6>Cliquer Sur enregistrer pour l'activer ou sur fermer pour annuler</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 3 Supprimer ce compte-->
<div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Souhaitez vous supprimer ce compte ?
          <h6>Cliquer Sur enregistrer pour le supprimer ou sur fermer pour annuler</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>