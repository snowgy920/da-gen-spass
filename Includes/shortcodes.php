<?php
class DA_GSP_Shortcode {
    protected static $instance;

    protected $slug = "da_genspass";
    protected $atts;

    // Call function to enqueue scripts and styles in the frontend?
    protected $enqueue_scripts_frontend = true;
    // Call function to enqueue scripts and styles in the admin pages?
    protected $enqueue_scripts_admin = false;

    protected function __construct()
    {
        add_shortcode($this->slug, array($this, 'shortcode_handler'));
        add_action( 'wp_enqueue_scripts', array($this,'enqueue_scripts') );
    }

    /*
     * Enqueue scripts for the frontend.
     */
    function enqueue_scripts() {
        /* this method will be overridden in child classes */
    }

    function shortcode_handler( $atts , $content="" ) {
        return render_view('PassForm');
    }

    public static function getInstance() {
        if (!isset(self::$instance))
        {
            self::$instance = new DA_GSP_Shortcode();
        }
        return self::$instance;
    }

}

DA_GSP_Shortcode::getInstance();