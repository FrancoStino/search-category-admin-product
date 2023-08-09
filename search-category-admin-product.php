<?php

// Definiamo una funzione per l'inclusione degli script nell'area di amministrazione
function pfw_enqueue_admin_scripts() {
    // Otteniamo il percorso completo dello script JavaScript pcswc-admin.js nel tema figlio
    $script_path = get_stylesheet_directory_uri() . '/search-category-admin-product/js/pcswc-admin.js';
    
    // Otteniamo il timestamp dell'ultima modifica dello script pcswc-admin.js
    // Utilizziamo il percorso del file locale, non l'URL, con la funzione filemtime()
    $script_mtime = filemtime(get_stylesheet_directory() . '/search-category-admin-product/js/pcswc-admin.js');

    // Includiamo lo script pfw-admin, specificando dipendenze come 'jquery'
    // Utilizziamo il percorso e il timestamp dell'ultima modifica dello script
    // Impostiamo il caricamento nello footer (parametro true) per migliorare le prestazioni
    wp_enqueue_script('pfw-admin', $script_path, array('jquery'), $script_mtime, true);

    // Localizziamo alcune variabili per l'utilizzo nello script
    // In questo caso, stiamo localizzando la stringa 'Cerca' per lo script
    wp_localize_script('pfw-admin', 'main_vars', array(
        'search' => __('Cerca', 'pcswc'),
    ));
}

// Aggiungiamo l'azione per chiamare la nostra funzione di inclusione degli script nell'area di amministrazione
// Utilizziamo la priorità 100 per garantire che la funzione venga eseguita dopo altre possibili inclusione di script
add_action('admin_enqueue_scripts', 'pfw_enqueue_admin_scripts', 100);
