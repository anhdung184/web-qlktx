<?php  
class DSNhanvienFile extends controller{
    public $nv;
    function __construct(){
        $this->nv=$this->model('DSNhanvienModels');
    }
    function Getdata(){
        $this->view('TrangchuLogin',[
            'page'=>"DSNhanvienFileView"
        ]);
    }
    function nhanvien_ins_file(){
        if(isset($_POST['btnInexcle'])){
            
            $file=$_FILES['file']['tmp_name'];
            // if(empty($file))
            $objReader=PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel=$objReader->load($file);
            //Lấy sheet hiện tại
            $sheet=$objExcel->getSheet(0);
            $sheetData=$sheet->toArray(null,true,true,true);
            for($i=2;$i<=count($sheetData);$i++){
                $manv=$sheetData[$i]["A"];
                $tnv=$sheetData[$i]["B"];
                $ngs=$sheetData[$i]["C"];
                $gt=$sheetData[$i]["D"];
                $sdt=$sheetData[$i]["E"];
                $dc=$sheetData[$i]["F"];
                $cv=$sheetData[$i]["G"];
                $kq=$this->nv->nhanvien_ins($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv);
                
            }
             echo "<script type='text/javascript'>alert('Import thành công!');</script>";
             $this->view('TrangchuLogin',[
                'page'=>"DSNhanvienFileView"
            ]);
        }
        // if(isset($_POST['btnThoat'])){
        //     $this->view('TrangchuLogin',[
        //         'page'=>'DSNhanvienView',
        //         'kq'=>$this->nv->lophoc_all(),
        //         'kqtk'=>$this->nv->TimkiemNV('')
        //        ]);
        // }
    }
}

?>