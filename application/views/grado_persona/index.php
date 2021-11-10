<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grado Persona Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('grado_persona/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Grado Id</th>
						<th>Grado Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($grado_persona as $g){ ?>
                    <tr>
						<td><?php echo $g['grado_id']; ?></td>
						<td><?php echo $g['grado_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('grado_persona/edit/'.$g['grado_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('grado_persona/remove/'.$g['grado_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
