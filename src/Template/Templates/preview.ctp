<?php   
    $format = "%s";
    if (!empty($this->request->query['live'])): 
        $format = '<div id="live-preview-content">%s</div>';
    endif; 
?>

<?php if ($template->layout->type == 'Html'): ?>
    <?php echo str_replace('{content_of_email_template}', sprintf($format, $template->body), $template->layout->body); ?>
<?php else: ?>
    <?php echo str_replace('{content_of_email_template}', sprintf($format, nl2br(h($template->body))), nl2br(h($template->layout->body))); ?>
<?php endif; ?>