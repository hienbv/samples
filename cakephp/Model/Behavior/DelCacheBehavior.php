<?php

/**
 * Delete cache files when delete or update in Model
 *
 * @author hienbv <hienbv@rikkei.com>
 * @version 1.0
 */
class DelCacheBehavior extends ModelBehavior {

    /**
     * Files list will remove
     * 
     * ### Detailed configuration
     *  protected $_listFiles = array(
     *      'Article' => array('query_index') 
     *  );
     * - Article is model name
     * - array('query_index'): list key that use to write cache
     * 
     * @access protected
     * @var array
     */
    private $__listFiles = null;

    public function __construct() {
        parent::__construct();
        $this->__listFiles = Configure::read('DelCache.listFiles');
    }

        /**
     * Extend afterDelete of ModelBehavior
     * 
     * @param \Model $model
     * @return void
     */
    public function afterDelete(\Model $model) {
        $this->__clearCacheModel($model);

        parent::afterDelete($model);
    }

    /**
     * Extend afterSave of ModelBehavior
     * 
     * @param \Model $model
     * @param type $created
     * @param type $options
     * @return bool
     */
    public function afterSave(\Model $model, $created, $options = array()) {
        $this->__clearCacheModel($model);

        return parent::afterSave($model, $created, $options);
    }

    /**
     * Execute to delete file cache
     * 
     * @param \Model $model
     * @return void
     */
    private function __clearCacheModel(\Model $model) {
        $modelName = get_class($model);
        if (isset($this->__listFiles[$modelName])) {
            foreach ($this->__listFiles[$modelName] as $key => $value) {
                Cache::delete($value);
            }
        }
    }
}
