<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
    <h1>Editar producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url."producto/save&id=".$pro->id;?>
<?php else:?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url."producto/save";?>
<?php endif;?>
<div class="form_container">
    
    <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>" required>

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" cols="30" rows="10"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>" required>

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias();?>
        <select name="categoria">
            <?php while($categoria=$categorias->fetch_object()):?>
                <option value="<?=$categoria->id?>" <?=isset($pro) && is_object($pro) && $categoria->id == $pro->categoria_id ? 'selected' : '';?>>
                    <?=$categoria->nombre?>
                </option>
            <?php endwhile;?>
        </select>
        
        <label for="imagen">Imagen</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):?>
            <img src="<?=base_url?>/uploads/images/<?=$pro->imagen?>" class="thumb">
        <?php endif;?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>

