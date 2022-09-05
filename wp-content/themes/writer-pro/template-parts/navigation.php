<div id="menu-target">
        <ul>
            <?php
         $writer_menu = wp_nav_menu( array(
                 'theme_location' => 'topmenu',
                 'menu_id'        => 'topmenu',
                 'menu_class'     => 'header__nav',
                 'echo'           => true
            ) );

     $writer_menu = str_replace("menu-item-has-children","menu-item-has-children has-children",$writer_menu); 
     echo wp_kses_post($writer_menu);

        ?> 
        </ul>
</div>
