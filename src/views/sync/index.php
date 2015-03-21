<?php

/* @var $this \yii\web\View */
/* @var $synchonizer \ufocoder\SyncSocial\components\Synchronizer */

$this->title = Yii::t( 'SyncSocial', 'Synchronization with social networks' );

$synchronizer = Yii::$app->synchonizer;
$services = $synchronizer->getServiceList();

?>
<?php if ( ! empty( $services ) ): ?>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th><?php echo Yii::t( 'SyncSocial', 'Social network' ); ?></th>
            <th><?php echo Yii::t( 'SyncSocial', 'Status' ); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ( $services as $service ): ?>
            <tr>
                <td>
                    <?= $service; ?>
                </td>
                <td>
                    <?php if ( ! $synchronizer->isConnected( $service ) ): ?>
                        <a class="btn btn-success btn-sm"
                           href="<?= $synchronizer->getAuthorizationUri( $service ); ?>">
                            <i class="glyphicon glyphicon-plus"></i> <?php echo Yii::t( 'SyncSocial', 'Connect' ); ?>
                        </a>
                    <?php else: ?>
                        <a class="btn btn-danger btn-sm"
                           href="<?= $synchronizer->getDisconnectUrl( $service ); ?>">
                            <i class="glyphicon glyphicon-remove"></i> <?php echo Yii::t( 'SyncSocial', 'Disconnect' ); ?>
                        </a>

                        <a class="btn btn-success btn-sm"
                           href="<?= $synchronizer->getSyncUrl( $service ); ?>">
                            <i class="glyphicon glyphicon-refresh"></i> <?php echo Yii::t( 'SyncSocial', 'Run synchronization' ); ?>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>