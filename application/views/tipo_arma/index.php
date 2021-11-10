<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Arma Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_arma/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Tipoarma Id</th>
						<th>Tipoarma Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tipo_arma as $t){ ?>
                    <tr>
						<td><?php echo $t['tipoarma_id']; ?></td>
						<td><?php echo $t['tipoarma_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_arma/edit/'.$t['tipoarma_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tipo_arma/remove/'.$t['tipoarma_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
