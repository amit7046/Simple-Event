
    <div class="se-nav-tab option-page <?php echo $active_tab == 'advanced_options' ? 'se-nav-tab-active' : ''; ?>">

<?php if(isset($_POST['SEsettingsUpdate'])) {
    if(isset($_POST['EVNT_clock'])) $EVNT_clock = $_POST['EVNT_clock']; else $EVNT_clock = "24";
    $EVNT_timezone = $_POST['EVNT_timezone'];
    $EVNT_author = $_POST['EVNT_author'];
    $EVNT_links = $_POST['EVNT_links'];
    if(isset($_POST['EVNT_twitter'])) $EVNT_twitter = $_POST['EVNT_twitter']; else $EVNT_twitter = "yes";
    update_option("EVNT_clock", $EVNT_clock);
    update_option("EVNT_ext_css", $EVNT_ext_css);
    update_option("EVNT_timezone", $EVNT_timezone);
    update_option("EVNT_author", $EVNT_author);
    update_option("EVNT_links", $EVNT_links);
    update_option("EVNT_twitter", $EVNT_twitter);
}
    ?>
<form method="post" class="advanced_options_form">
    <table class="form-table">
        <tbody>
            <tr>
                <th colspan="2"><h2>Advanced Settings</h2></th>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Time notation',EVNT_TEXTDOMAIN);?></th>
                <td class="activated">
                    <input type="checkbox" name="EVNT_clock" value="12" <?php if(get_option('EVNT_clock') == "12") echo "checked";?> />
                    <label><?php _e('Change time to 12 hour (AM/PM) clock notation.',EVNT_TEXTDOMAIN);?></label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Timezone',EVNT_TEXTDOMAIN);?></th>
                <td class="activated">
                    <select name="EVNT_timezone" id="DropDownTimezone">
                        <option value="-12:00" <?php if(get_option('EVNT_timezone') == "-12:00") echo "selected";?>>(GMT -12:00) Eniwetok, Kwajalein</option>
                        <option value="-11:00" <?php if(get_option('EVNT_timezone') == "-11:00") echo "selected";?>>(GMT -11:00) Midway Island, Samoa</option>
                        <option value="-10:00" <?php if(get_option('EVNT_timezone') == "-10:00") echo "selected";?>>(GMT -10:00) Hawaii</option>
                        <option value="-09:00" <?php if(get_option('EVNT_timezone') == "-09:00") echo "selected";?>>(GMT -9:00) Alaska</option>
                        <option value="-08:00" <?php if(get_option('EVNT_timezone') == "-08:00") echo "selected";?>>(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                        <option value="-07:00" <?php if(get_option('EVNT_timezone') == "-07:00") echo "selected";?>>(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                        <option value="-06:00" <?php if(get_option('EVNT_timezone') == "-06:00") echo "selected";?>>(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                        <option value="-05:00" <?php if(get_option('EVNT_timezone') == "-05:00") echo "selected";?>>(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                        <option value="-04:00" <?php if(get_option('EVNT_timezone') == "-04:00") echo "selected";?>>(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                        <option value="-03:30" <?php if(get_option('EVNT_timezone') == "-03:30") echo "selected";?>>(GMT -3:30) Newfoundland</option>
                        <option value="-03:00" <?php if(get_option('EVNT_timezone') == "-03:00") echo "selected";?>>(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                        <option value="-02:00" <?php if(get_option('EVNT_timezone') == "-02:00") echo "selected";?>>(GMT -2:00) Mid-Atlantic</option>
                        <option value="-01:00" <?php if(get_option('EVNT_timezone') == "-01:00") echo "selected";?>>(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                        <option value="+00:00" <?php if(get_option('EVNT_timezone') == "+00:00") echo "selected";?>>(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                        <option value="+01:00" <?php if(get_option('EVNT_timezone') == "+01:00") echo "selected";?>>(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                        <option value="+02:00" <?php if(get_option('EVNT_timezone') == "+02:00") echo "selected";?>>(GMT +2:00) Kaliningrad, South Africa</option>
                        <option value="+03:00" <?php if(get_option('EVNT_timezone') == "+03:00") echo "selected";?>>(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                        <option value="+03:30" <?php if(get_option('EVNT_timezone') == "+03:30") echo "selected";?>>(GMT +3:30) Tehran</option>
                        <option value="+04:00" <?php if(get_option('EVNT_timezone') == "+04:00") echo "selected";?>>(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                        <option value="+04:30" <?php if(get_option('EVNT_timezone') == "+04:30") echo "selected";?>>(GMT +4:30) Kabul</option>
                        <option value="+05:00" <?php if(get_option('EVNT_timezone') == "+05:00") echo "selected";?>>(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                        <option value="+05:30" <?php if(get_option('EVNT_timezone') == "+05:30") echo "selected";?>>(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                        <option value="+05:45" <?php if(get_option('EVNT_timezone') == "+05:45") echo "selected";?>>(GMT +5:45) Kathmandu</option>
                        <option value="+06:00" <?php if(get_option('EVNT_timezone') == "+06:00") echo "selected";?>>(GMT +6:00) Almaty, Dhaka, Colombo</option>
                        <option value="+07:00" <?php if(get_option('EVNT_timezone') == "+07:00") echo "selected";?>>(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                        <option value="+08:00" <?php if(get_option('EVNT_timezone') == "+08:00") echo "selected";?>>(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                        <option value="+09:00" <?php if(get_option('EVNT_timezone') == "+09:00") echo "selected";?>>(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                        <option value="+09:30" <?php if(get_option('EVNT_timezone') == "+09:30") echo "selected";?>>(GMT +9:30) Adelaide, Darwin</option>
                        <option value="+10:00" <?php if(get_option('EVNT_timezone') == "+10:00") echo "selected";?>>(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                        <option value="+11:00" <?php if(get_option('EVNT_timezone') == "+11:00") echo "selected";?>>(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                        <option value="+12:00" <?php if(get_option('EVNT_timezone') == "+12:00") echo "selected";?>>(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                        </select>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Link action',EVNT_TEXTDOMAIN);?></th>
                <td class="activated">
                    <select name="EVNT_links">
                        <option value="both" <?php if(get_option('EVNT_links') == "both") echo "selected";?>><?php _e('Open both links in a new window',EVNT_TEXTDOMAIN);?></option>
                        <option value="location" <?php if(get_option('EVNT_links') == "location") echo "selected";?>><?php _e('Open only the Location link in a new window',EVNT_TEXTDOMAIN);?></option>
                        <option value="information" <?php if(get_option('EVNT_links') == "information") echo "selected";?>><?php _e('Open only the More Information link in a new window',EVNT_TEXTDOMAIN);?></option>
                        <option value="none" <?php if(get_option('EVNT_links') == "none") echo "selected";?>><?php _e('Open both links in the same window',EVNT_TEXTDOMAIN);?></option>
                    </select>
                </td>
            </tr>
<?php if (current_user_can('manage_options'))  { ?>
            <tr valign="top">
                <th scope="row"><?php _e('Event managers',EVNT_TEXTDOMAIN);?></th>
                <td class="activated">
                    <select name="EVNT_author">
                        <option value="manage_options" <?php if(get_option('EVNT_author') == "manage_options") echo "selected";?>>Administrator</option>
                        <option value="publish_pages" <?php if(get_option('EVNT_author') == "publish_pages") echo "selected";?>>Editor</option>
                        <option value="publish_posts" <?php if(get_option('EVNT_author') == "publish_posts") echo "selected";?>>Author</option>
                        <option value="edit_posts" <?php if(get_option('EVNT_author') == "edit_posts") echo "selected";?>>Contributor</option>
                        <option value="read" <?php if(get_option('EVNT_author') == "read") echo "selected";?>>Subscriber</option>                    
                    </select>
                </td>
            </tr>
<?php } ?>
            <tr valign="top">
                <th scope="row"><?php _e('Twitter',EVNT_TEXTDOMAIN);?></th>
                <td class="activated">
                    <input type="checkbox" name="EVNT_ext_css" value="yes" <?php if(get_option('EVNT_ext_css') == "yes") echo "checked";?> />
                    <label><?php _e('Disable Twitter',EVNT_TEXTDOMAIN);?></label>
                    <span class="explanation"><?php _e('By disabling Twitter, the JavaScript of the Twitter API will not be loaded for this plugin.',EVNT_TEXTDOMAIN);?></span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <p class="submit">
                        <input name="SEsettingsUpdate" type="submit" value="<?php _e('Update settings',EVNT_TEXTDOMAIN)?>" class="button-primary" />
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div> <!-- END se-nav-tab option-page -->