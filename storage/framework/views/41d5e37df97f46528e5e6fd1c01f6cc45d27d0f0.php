<?php $__env->startSection('title','Lista de Estudiantes'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Estudiantes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('students.create')); ?>">Agregar nuevo estudiante</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success" role="alert">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th width="280px">Accion</th>
        </tr>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($student->name); ?></td>
                <td><?php echo e($student->age); ?></td>
                <td>
                    <form action="<?php echo e(route('students.destroy',$student->id)); ?>" method="POST">

                        <a class="btn btn-info" href="<?php echo e(route('students.show',$student->id)); ?>">Mostrar</a>

                        <a class="btn btn-primary" href="<?php echo e(route('students.edit',$student->id)); ?>">Editar</a>

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo $students->links(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('students.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>