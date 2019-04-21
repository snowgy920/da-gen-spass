<!-- Generator Tools -->
<div class="da-generator-container">
    <form id="generator-form" class="da-generator__tools">
        
        <!-- Password Field -->
        <div class="password-field">
            <input id="da_sec_password" class="password" type="text" spellcheck="false">

            <!-- Copy the password -->
            <div class="pass-copy switch-info">
                <button data-clipboard-target="#GENERATED-PASSWORD" class="da-gen-icon icon-copy da-clipboard-copy"></button>
                <span class="switch-info__description sm">Copy</span>
            </div>

            <!-- Regenerate the password -->
            <div class="pass-regen switch-info">
                <button id="btn_gen_pass" class="da-gen-icon icon-regen"></button>
                <span class="switch-info__description sm">Generate</span>
            </div>
        </div>

        <!-- Customization Section -->
        <div class="customization collapsed">
            <h6 class="da-low-header toggle">
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
                            <input type="range" min="1" max="50" value="10" class="pass-length" id="pass_length">
                        </div>

                        <!-- Input - Number -->
                        <div class="option__field__item">
                            <input type="number" id="pass_length_value" value="10">
                        </div>
                    </div>
                </div>

                <!-- Password Type -->
                <div class="option">

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
                                <div class="switch-info__description">
                                    Any character combinations like !, 7, h, K, and l1
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
                        <!-- Numbers -->
                        <div class="option__field__item">
                            <label class="checkbox-container">Numbers
                                <input type="checkbox" id="chk_allow_numbers" checked="checked">
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
        <button class="copy-button da-clipboard-copy">
            Copy Password
            <img src="<?php echo da_gen_plugin_url( 'assets/images/PNGs/img-icon-copy-@3x-white.png' ); ?>" alt="">
        </button>
    </form>
</div>