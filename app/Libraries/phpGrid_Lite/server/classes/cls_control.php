<?php
class C_HtmlControl
{
    private $type;
    private $varname;
    private $text;
    private $val;
    private $is_chosen;
    private $is_disabled;
    private $attr_select;        // html attribute text for "checked", "selected" etc. depend on control type
    
    public function __construct($newtype, $newvarname, $newval, $newtext, $new_attrselect, $disable = false){
        $this->type         = $newtype;
        $this->text         = $newtext;
        $this->varname      = $newvarname;
        $this->val          = $newval;
        $this->is_chosen    = false;
        $this->is_diabled   = $disable;
        $this->attr_select  = $new_attrselect;
    }    
    
    public function render(){
        $html = "";
        switch($this->type){
            case "select":
                $html.= "<option value='". $this->val ."'";
                break;
            default:
                $html.=  "<input name ='". $this->varname 
                            ."[]' id   ='". $this->varname 
                            ."[]' type ='". $this->type 
                            ."'   value='". $this->val 
                            ."'";    
                $html .= ($this->is_disabled) ? " onfocus='blur();' " : "";
        }
        $html .= ($this->is_chosen)  ? " ".$this->attr_select." " : "";
        $html .= " />". $this->text;
        
        print($html);
    }    
}




class Radio extends C_HtmlControl
{
    // Calls base class contructor first
    public function __construct($newvarname, $newval, $newtext){
        parent::C_HtmlControl("radio", $newvarname, $newval, $newtext, "checked");    
    }
        
    public function get_value(){
        return $this->val;
    }
    
    public function set_value($newval){
        $this->val = $newval;    
    }
    
    public function render(){
        parent::render();
    }
}




class Dropdown extends C_HtmlControl
{
    // Calls base class contructor first
    public function __construct($newvarname, $newval, $newtext){
        parent::C_HtmlControl("select", $newvarname, $newval, $newtext, "selected");    
    }
        
    public function get_value(){
        return $this->val;
    }
    
    public function set_value($newval){
        $this->val = $newval;    
    }
    
    public function render(){
        parent::render();
    }
}






class Checkbox extends C_HtmlControl
{
    private $delimiter;
    
    // Calls base class contructor first
    public function __construct($newvarname, $newval, $newtext, $newdelim){
        $this->delimiter = $newdelim;
        parent::C_HtmlControl("checkbox", $newvarname, $newval, $newtext, "checked");    
    }
        
    public function get_value(){
        return $this->val;
    }
    
    public function set_value($newval){
        $this->val = $newval;    
    }
    
    public function get_delimiter(){
        return $this->delimiter;
    }
    
    public function set_delimiter($newdelim){
        $this->delimiter = $newdelim;    
    }
    
    public function render(){
        parent::render();
    }
}




class Multiselect extends C_HtmlControl
{
    private $delimiter;
    private $size;
    
    // Calls base class contructor first
    public function __construct($newvarname, $newval, $newtext, $newsize, $newdelim){
        $this->size = $newsize;
        $this->delimiter = $newdelim;
        parent::C_HtmlControl("select", $newvarname, $newval, $newtext, "selected");    
    }
        
    public function get_value(){
        return $this->val;
    }
    
    public function set_value($newval){
        $this->val = $newval;    
    }
    
    function get_delimiter(){
        return $this->delimiter;
    }
    
    public function set_delimiter($newdelim){
        $this->delimiter = $newdelim;    
    }
    
    public function render(){
        $html = "";
        $html.= "<option value='". $this->val ."'";
        $html .= ($this->is_chosen)  ? " ".$this->attr_select." " : "";
        $html .= " />". $this->text;
        
        print($html);
    }
}
?>