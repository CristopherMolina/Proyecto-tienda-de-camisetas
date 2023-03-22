<h1>Gestion de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear producto
</a>



<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'):?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'):?>
    <strong class="alert_red">El producto no se ha creado correctamente</strong>
<?php endif;?>
<?php Utils::deleteSession('producto')?>

<?php if(isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete'):?>
    <strong class="alert_green">El producto se ha editado correctamente</strong>
<?php elseif(isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed'):?>
    <strong class="alert_red">El producto no se ha editado correctamente</strong>
<?php endif;?>
<?php Utils::deleteSession('edit')?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'):?>
    <strong class="alert_red">El producto no se ha eliminado correctamente</strong>
<?php endif;?>
<?php Utils::deleteSession('delete')?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>   
    <?php while($producto = $productos->fetch_object()):?>
        <tr>
            <td><?=$producto->id?></td>
            <td><?=$producto->nombre?></td>
            <td><?=$producto->precio?></td>
            <td><?=$producto->stock?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$producto->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>   
    <?php endwhile;?>
</table>