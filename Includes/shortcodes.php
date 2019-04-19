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
        $output = <<<E
<!-- Generator Tools -->
<form id="generator-form" class="generator__tools">
    
    <!-- Password Field -->
    <div class="password-field">
        <input class="password success" type="text" value="SWdbDn4N0Y">

        <!-- Copy the password -->
        <span class="pass-copy">
            <img height="30" src="img/SVGs/img-icon-copy-@3x.svg" alt="Copy to the Clipboard">
        </span>

        <!-- Regenerate the password -->
        <span class="pass-regen">
            <img height="30" src="img/SVGs/icon-generate-new.svg" alt="Regenerate a new Password">
        </span>
    </div>

    <!-- Customization Section -->
    <div class="customization collapsed">
        <h6 class="low-header toggle">
            CUSTOMIZE YOUR PASSWORD
        </h6>

        <!-- Options -->
        <div class="options">

            <!-- Password Length -->
            <div class="option">

                <!-- Title -->
                <span class="option__title">Password Length :</span>

                <!-- Field -->
                <div class="option__field">

                    <!-- Input - Range -->
                    <div class="option__field__item">
                        <input type="range" min="1" max="50" value="10" class="pass-length" id="pass-length">
                    </div>

                    <!-- Input - Number -->
                    <div class="option__field__item">
                        <input type="number" value="10">
                    </div>
                </div>
            </div>

            <!-- Password Type -->
            <div class="option">

                <!-- Title -->
                <span class="option__title">Password Type :</span>
                
                <!-- Field -->
                <div class="option__field types">

                    <!-- Switch Button -->
                    <!-- Easy to read -->
                    <div class="option__field__item">

                        <!-- Switch -->
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>

                        <!-- Switch Label -->
                        <span class="switch-label">Easy to read</span>

                        <!-- Switch Information -->
                        <span class="switch-info">
                            <img src="img/PNGs/icon-info.png" alt="">
                            <div class="switch-info__description">
                                Lorem ipsum dolar sit amet.
                            </div>
                        </span>
                    </div>

                    <!-- Switch Button -->
                    <!-- Easy to say -->
                    <div class="option__field__item">

                        <!-- Switch -->
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>

                        <!-- Switch Label -->
                        <span class="switch-label">Easy to say</span>

                        <!-- Switch Information -->
                        <span class="switch-info">
                            <img src="img/PNGs/icon-info.png" alt="">
                            <div class="switch-info__description">
                                Lorem ipsum dolar sit amet.
                            </div>
                        </span>
                    </div>

                    <!-- Radio Button -->
                    <!-- All Characters -->
                    <div class="option__field__item">

                        <!-- Switch -->
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>

                        <!-- Switch Label -->
                        <span class="switch-label">All Characters</span>

                        <!-- Switch Information -->
                        <span class="switch-info">
                            <img src="img/PNGs/icon-info.png" alt="">
                            <div class="switch-info__description">
                                Lorem ipsum dolar sit amet.
                            </div>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Characters-->
            <div class="option">

                <!-- Title -->
                <span class="option__title">Characters :</span>

                <!-- Field -->
                <div class="option__field characters">

                    <!-- Checkbox -->
                    <!-- Uppercase -->
                    <div class="option__field__item">
                        <label class="checkbox-container">Uppercase
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <!-- Checkbox -->
                    <!-- Numbers -->
                    <div class="option__field__item">
                        <label class="checkbox-container">Numbers
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <!-- Checkbox -->
                    <!-- Lowercase -->
                    <div class="option__field__item">
                        <label class="checkbox-container">Lowercase
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <!-- Checkbox -->
                    <!-- Symbols -->
                    <div class="option__field__item">
                        <label class="checkbox-container">Symbols
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Button to copy -->
    <button class="copy-button">
        Copy Password
        <img src="img/PNGs/img-icon-copy-@3x-white.png" alt="">
    </button>
</form>
E;
        return $output;
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