<?php echo $__env->make('googlmapper::javascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php foreach($items as $id => $item): ?>

	<?php echo $item->render($id, $view); ?>


    <?php if($options['async']): ?>

        <script type="text/javascript">

            initialize_items.push({
                method: initialize_<?php echo $id; ?>

            });

        </script>

    <?php endif; ?>

<?php endforeach; ?>
