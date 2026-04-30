<?php echo $this->extend('Admin/layout/principal') ?>

<?php echo $this->section('titulo') ?>
Usuários
<?php echo $this->endSection() ?>

<?php echo $this->section('estilos') ?>
<link rel="stylesheet" href="<?php echo site_url('Admin/vendors/auto-complete/jquery-ui.css') ?>">
<?php echo $this->endSection() ?>

<?php echo $this->section('conteudo') ?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $titulo ?></h4>


            <div class="ui-widget">
                <input id="query" name="query" placeholder="Pesquise por um nome" class="form-control bg-light mb-5">
            </div>


            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>RA</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url("/admin/usuarios/show/$usuario->id")?>">
                                    <?php echo $usuario->ra ?>
                                </a>
                                </td>
                                <td><?php echo $usuario->nome ?></td>
                                <td><?php echo $usuario->email ?></td>
                                <td>
                                    <?php echo $usuario->ativo
                                        ? '<label class="badge badge-primary">SIM</label>'
                                        : '<label class="badge badge-danger">Não</label>' ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>


<?php echo $this->section('scripts') ?>
<script>
    (function() {
        function loadScript(src, callback) {
            var s = document.createElement('script');
            s.src = src;
            s.onload = callback;
            document.head.appendChild(s);
        }

        function initAutocomplete($) {
            $(function() {
                $("#query").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "<?php echo site_url("admin/usuarios/procurar")?>",
                            dataType: "json",
                            data: {
                                term: request.term
                            },
                            success: function(data) {
                                if (data.length < 1) {
                                    response([
                                        {
                                            label: 'Usuário não encontrado',
                                            value: -1,
                                        }
                                    ]);
                                } else {
                                    response(data);
                                }
                            },
                        });
                    },
                    minLength: 1,
                    select: function(event, ui) {
                        if (ui.item.value == -1) {
                            $(this).val("");
                            return false;
                        }

                        window.location.href = '<?php echo site_url('admin/usuarios/show/'); ?>' + ui.item.id;
                    }
                });
            });
        }

        function loadJqueryUiAndInit() {
            if (window.jQuery && window.jQuery.ui && window.jQuery.ui.autocomplete) {
                initAutocomplete(window.jQuery);
                return;
            }

            loadScript("<?php echo site_url('Admin/vendors/auto-complete/jquery-ui.js') ?>", function() {
                initAutocomplete(window.jQuery);
            });
        }

        if (window.jQuery) {
            loadJqueryUiAndInit();
        } else {
            loadScript("https://code.jquery.com/jquery-3.7.1.min.js", loadJqueryUiAndInit);
        }
    })();
</script>
<?php echo $this->endSection() ?>