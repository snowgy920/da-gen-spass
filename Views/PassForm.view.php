<?php
$color = get_option('da_gen_spass_color');
$font1 = get_option('da_gen_spass_font1');
$font2 = get_option('da_gen_spass_font2');
?>
<style>
<?php if (!empty($font1)) { ?>
.generator-container input, .generator-container button {
    font-family: "<?php echo $font1; ?>", sans-serif !important;
}
<?php } ?>

<?php if (!empty($font2)) { ?>
.generator-container, .generator-container h6, .generator-container label {
    font-family: "<?php echo $font2; ?>", sans-serif !important;
}
<?php } ?>
<?php if (!empty($color)) { ?>
.generator-container, .generator-container h6, .generator-container label,
.generator-container .option__title, .generator-container .switch-label, .da-option input[type=number] {
    color: <?php echo $color; ?> !important;
}
<?php } ?>
</style>
<!-- GENERATOR -->
<div class="generator-container">

    <!-- Generator Tools -->
    <form id="generator-form" class="generator__tools">
        
        <!-- Password Field -->
        <div class="da-password-field">
            <input id="da_sec_password" class="da-password success" type="text" value="" spellcheck="false">

            <!-- Copy the password -->
            <span class="pass-copy da-clipboard-copy ">
                <img height="30" src="<?php echo DA_GSP_PLUGIN_URL?>/assets/images/SVGs/img-icon-copy-@3x.svg" alt="Copy to the Clipboard">
            </span>

            <!-- Regenerate the password -->
            <span id="btn_gen_pass" class="pass-regen">
                <img height="30" src="<?php echo DA_GSP_PLUGIN_URL?>/assets/images/SVGs/icon-generate-new.svg" alt="Regenerate a new Password">
            </span>
        </div>

        <!-- Customization Section -->
        <div class="customization collapsed">
            <h6 class="low-header toggle">
                CUSTOMIZE YOUR PASSWORD
            </h6>

            <!-- Options -->
            <div class="da-options">

                <!-- Password Length -->
                <div class="da-option">

                    <!-- Title -->
                    <span class="option__title">Password Length :</span>

                    <!-- Field -->
                    <div class="option__field">

                        <!-- Input - Range -->
                        <div class="option__field__item">
                            <input type="range" min="1" max="50" value="10" class="pass-length" id="pass_length">
                        </div>

                        <!-- Input - Number -->
                        <div class="option__field__item">
                            <input type="number" class="pass_length_value" id="pass_length_value" value="10">
                        </div>
                    </div>
                </div>

                <!-- Password Type -->
                <div class="da-option">

                    <!-- Title -->
                    <span class="option__title">Password Type :</span>
                    
                    <!-- Field -->
                    <div class="option__field da-pass-types">

                        <!-- Switch Button -->
                        <!-- Easy to read -->
                        <div class="option__field__item">

                            <!-- Switch -->
                            <label class="switch">
                                <input type="checkbox" id="chk_easy_to_read">
                                <span class="slider round"></span>
                            </label>

                            <!-- Switch Label -->
                            <span class="switch-label">Easy to read</span>

                            <!-- Switch Information -->
                            <span class="switch-info default-info">
                                <img src="<?php echo DA_GSP_PLUGIN_URL?>/assets/images/PNGs/icon-info.png" alt="">
                                <div class="switch-info__description">
                                    Avoid ambiguous characters like l, 1, O, and 0
                                </div>
                            </span>
                        </div>

                        <!-- Switch Button -->
                        <!-- Easy to say -->
                        <div class="option__field__item">

                            <!-- Switch -->
                            <label class="switch">
                                <input type="checkbox" id="chk_easy_to_say">
                                <span class="slider round"></span>
                            </label>

                            <!-- Switch Label -->
                            <span class="switch-label">Easy to say</span>

                            <!-- Switch Information -->
                            <span class="switch-info default-info">
                                <img src="<?php echo DA_GSP_PLUGIN_URL?>/assets/images/PNGs/icon-info.png" alt="">
                                <div class="switch-info__description">
                                    Avoid numbers and special characters
                                </div>
                            </span>
                        </div>

                        <!-- Radio Button -->
                        <!-- All Characters -->
                        <div class="option__field__item">

                            <!-- Switch -->
                            <label class="switch">
                                <input type="checkbox" id="chk_all_char" checked>
                                <span class="slider round"></span>
                            </label>

                            <!-- Switch Label -->
                            <span class="switch-label">All Characters</span>

                            <!-- Switch Information -->
                            <span class="switch-info default-info">
                                <img src="<?php echo DA_GSP_PLUGIN_URL?>/assets/images/PNGs/icon-info.png" alt="">
                                <div class="switch-info__description">
                                    Any character combinations like !, 7, h, K, and l1
                                </div>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Characters-->
                <div class="da-option">

                    <!-- Title -->
                    <span class="option__title">Characters :</span>

                    <!-- Field -->
                    <div class="option__field da-allow-characters">

                        <!-- Checkbox -->
                        <!-- Uppercase -->
                        <div class="option__field__item">
                            <label class="checkbox-container">Uppercase
                                <input type="checkbox" id="chk_allow_uppers" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <!-- Checkbox -->
                        <!-- Lowercase -->
                        <div class="option__field__item">
                            <label class="checkbox-container">Lowercase
                                <input type="checkbox" id="chk_allow_lowers" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <!-- Checkbox -->
                        <!-- Numbers -->
                        <div class="option__field__item">
                            <label class="checkbox-container">Numbers
                                <input type="checkbox" id="chk_allow_numbers" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <!-- Checkbox -->
                        <!-- Symbols -->
                        <div class="option__field__item">
                            <label class="checkbox-container">Symbols
                                <input type="checkbox" id="chk_allow_symbols" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Button to copy -->
        <button class="da-copy-button da-clipboard-copy">
            Copy Password
            <img src="<?php echo DA_GSP_PLUGIN_URL?>/assets/images/PNGs/img-icon-copy-@3x-white.png" alt="">
        </button>
    </form>
</div>
<script>
    (function() {

        /*
        * Toggle Customization Section
        */
        let cust = document.querySelector(".customization");

        document
            .querySelector(".customization .low-header")
            .addEventListener("click", function () {
                cust.classList.toggle("collapsed");
        });

    })();
</script>
