<?php
 
if(!isset($_SESSION['user'])) { ?>
    <!-- Logged out -->
    <h2>Willkommen zurück bei den Snippets</h2>
    <p>Eine kleine Snippetdatenbank für Webentwickler.</p>
<?php } else { ?>
    <!-- Logged in -->
    <h2>Willkommen zurück, <?= $_SESSION['user']->getUsername(); ?>!</h2>
    <p>Wir freuen uns, dass du wieder da bist.</p>
        <form class="search-form" method="POST" action="./index.php?action=search">
        <input type="search" name="search" placeholder="Suche" value="<?php echo isset($get['search']) ? $get['search'] : ''; ?>">
        <button type="submit">Suchen</button>
    </form>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=newSnippet" class="btn btn-primary-outline my-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 mr-1 bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
        </svg>
        Neues Snippet erstellen
    </a>

 
    <?php
    $html = '<table>';
    $html .= '<tr>';
        $html .= '<th>Id</th>';
        $html .= '<th>Title</th>';
        $html .= '<th>Beschreibung</th>';
        $html .= '<th>Sprache</th>';
        $html .= '<th>Tags</th>';
        $html .= '<th>Aktion</th>';
    $html .= '</tr>';
 
    foreach($snippets as $snippet) {
        $html .= '<tr>';
            $html .= '<td>'.$snippet->getId().' - '.($snippet->getUser())->getUsername().'</td>';
            $html .= '<td>'.$snippet->getTitle().'</td>';
            $html .= '<td>'.$snippet->getDescription().'</td>';
            $html .= '<td>'.$snippet->getLanguage().'</td>';
            $html .= '<td>'.$snippet->getTags().'</td>';
            $html .= '<td><a style="text-decoration:none;" href="index.php?action=viewSnippet&id='.$snippet->getId().'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
            </a>
            <a style="text-decoration:none;" href="index.php?action=editSnippet&id='.$snippet->getId().'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                </svg>
            </a>
                <a style="text-decoration:none;" href="index.php?action=deleteSnippet&id='.$snippet->getId().'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </a>
            </td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
 
    echo $html;
    ?>
   
   
<?php } ?>