<?php
function databaseSearch_LC($searchWord){
    /*  
     * Function to return the database search
    */
    
    // Database connection 
	global $wpdb; 
	$query = "SELECT * FROM `table_exemple` WHERE UPPER(column_name) LIKE UPPER('%$searchWord%')"; 
	$searchResult = $wpdb-> get_results($query);
    
    // Result return
    if($searchResult) { ?>
        <?php return $searchResult;
    }
    return false; 
}

function exibeSearch_LC($data) {
    // Import JS
    include_once(DiretorioPlugin."class/js/goback-button.js");

    // Data filter
    $searchResult = databaseSearch_LC($data);
   
    // Not found
    if (!$searchResult){ ?>
        <div>
            <h3>Nenhum resultado</h3><br>
            <p>Não encontramos nenhum resultado registrado com o dado '<?= $data ?>' informado.</p>
            <button onclick="goBack()">PROCURAR OUTRO</button> 
        </div>
        
    <?php return;
    } ?>

    <!-- Found -->
    <div>
        <h3>Resultado encontrado</h3><br>
        <div>
            <?php foreach ($searchResult as $column){ ?>
                <p><b>Nome: </b><?= $column->column_name ?></p>
            <?php } ?>
        </div>
    </div> 
    <button onclick="goBack()">PROCURAR OUTRO</button> 
    <?php 
}


function formPlugin_LC(){

    // Inicialize variable
    $searchWord = isset($_POST['word']) ? $_POST['word'] : false;
    
    /*  Consult database and result in HTML*/
    if($searchWord){
        exibeSearch_LC($searchWord);
    }
    
    /* Form for search */
    else { ?>
        <div>
            <form method="POST">
                <h3>Localizar</h3> 
                <input type="text" name="word" id="word" placeholder="Digite o nome..." value="<?=$_POST['word']?>" required>            
                <input type='submit' value='pesquisar'>
            </form>
        </div>
    <?php 
   }
}

/**
 * Register a shortcode 
 */
function shortcodeForm_LC(){
    add_shortcode('plugin-filter-search','formPlugin_LC');
}
add_action('init', 'shortcodeForm_LC');