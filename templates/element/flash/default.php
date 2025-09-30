<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$alertClass = 'alert-primary';
$icon = 'fas fa-info-circle';

if (!empty($params['class'])) {
    switch ($params['class']) {
        case 'success':
            $alertClass = 'alert-success';
            $icon = 'fas fa-check-circle';
            break;
        case 'error':
        case 'danger':
            $alertClass = 'alert-danger';
            $icon = 'fas fa-exclamation-circle';
            break;
        case 'warning':
            $alertClass = 'alert-warning';
            $icon = 'fas fa-exclamation-triangle';
            break;
        case 'info':
            $alertClass = 'alert-info';
            $icon = 'fas fa-info-circle';
            break;
    }
}

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert <?php echo h($alertClass) ?> alert-dismissible fade show" role="alert">
    <i class="<?php echo h($icon) ?> me-2"></i>
    <?php echo $message ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
