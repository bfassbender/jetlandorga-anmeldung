<?php
class Template {
    var $file = null;
    var $data = null;
    
    function setFile($file) {
        $this->file = (string) $file;
    }
    
    function getFile() {
        return $this->file;
    }
    
    function setData($data) {
        if(is_array($data)) {
            $this->data = $data;
        }
    }
    
    function getData() {
        return $this->data;
    }
    
    function render() {
        if(file_exists($this->getFile())) {
            if($this->getData()) {
                foreach($this->getData() AS $key => $value) {
                    ${$key} = $value;
                }
            }
            ob_start();
            include $this->getFile();
            $content = ob_get_clean();
            
            
            return $content;
        }
    }
    
   function element($file) {
        if(file_exists($file)) {
            include $file;
        }
    }
    
}
