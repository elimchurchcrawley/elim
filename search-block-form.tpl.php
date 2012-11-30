<input type="text" name="search_block_form" value="<?php echo t("To search, type and hit enter"); ?>" id="filter_keyword" onfocus="if (this.value == '<?php echo t("To search, type and hit enter"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo t("To search, type and hit enter"); ?>';}" />
<?php print $search['hidden']; ?>
<input type="submit" class="s_button_hid" name="op" id="searchsubmit" value="<?php print t('Search'); ?>" />


