<table class="form-table">
    <tbody>
    <tr valign="top">
        <th>Text Color</th>
        <td>
            <input type="text" name="da_gen_spass_color" value="<?php echo get_option('da_gen_spass_color'); ?>" class="cpa-color-picker">
        </td>
    </tr>
    <tr valign="top">
        <th>Font for controls</th>
        <td>
            <div class="bfh-selectbox bfh-fonts" data-name="da_gen_spass_font1" data-font="<?php echo get_option('da_gen_spass_font1', 'Arial');?>"></div>
        </td>
    </tr>
    <tr valign="top">
        <th>Font for texts</th>
        <td>
            <select name="da_gen_spass_font2" class="form-control bfh-googlefonts" data-font="<?php echo get_option('da_gen_spass_font2', 'Source Sans Pro');?>"></select>
        </td>
    </tr>
</tbody>
</table>