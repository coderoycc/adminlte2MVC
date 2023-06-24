<!-- <div class="content-wrapper" style="min-height: 717px"> -->
  <section class="contenet-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Administración de Usuarios</h3>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <button type="button" class="btn btn-success crear-perfil" data-toggle="modal" data-target="#modal-crear-usuario">Crear nuevo usuario</button><br>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped dt-responsive tablaperfil" width="100%">
                <thead>
                  <tr>
                    <th style="width:10px">#</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>FOTO</th>
                    <th>ROL</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach ($users as $key => $value) {
                ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value["nombre"]; ?></td>
                    <td><?php echo $value["email"]; ?></td>
                    <td><?php echo $value["foto"]; ?></td>
                    <td><?php echo $value["rol"]; ?></td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-primary btn-lg btn-editar-perfil" data-toggle="modal" data-target="#modal-editar-usuario"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-lg btn-eliminar-perfil"><i class="fa fa-trash"></i></button>
                        <button class="btn btn-info btn-lg btn-ver-perfil"><i class="fa fa-eye"></i></button>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- </div> -->


<!-- MODAL CREAR USUARIOS -->
<div class="modal modal-default fade" id="modal-crear-usuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="alert alert-success alert-dismissible">Agregar nuevo usuario</h4>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" id="form-user">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
          </div>
          <div class="form-group">
            <label for="usuario">Correo:</label>
            <input type="text" class="form-control" id="usuario" name="email" placeholder="Ingresa tu usuario" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
          </div>
          <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
            <img class="previewImg img-fuid py-2" width='200' height='200'>
            <p class="help-block text-danger small">Tamaño recomendado: 200x200 | Peso de la imagen: 2MB</p>
          </div>
          <div class="form-group has-feedback">
            <label for="rol">ROL:</label>
            <select name="rol" id="rol" required>
              <option value="">Selecciona un rol</option>
              <option value="1">Administrador</option>
              <option value="2">Vendedor</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

          <?php
          $saveUser = new ctrUsers();
          $saveUser->ctrAddUser();
          ?>
        </form>
      </div>
    </div>
  </div>
</div>

