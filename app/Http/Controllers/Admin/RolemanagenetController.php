<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Menu;
use View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class RolemanagenetController extends Controller {

    /*Used for Add/Edit/Delete Role*/

    public function manageRole()
    {
       $roles = Role::all();
       return view('roleManagement.manageRole');
    }


    public function getAddrolelisting(){
        $this->layout                                                       =   View::make('layouts.ajax');
        $inputArr                                                           =   Input::all();
        $organisation_name                                                          =   '';
        $dbObj                                                              =   DB::table('roles');

        $custompaginatorres                                                 =   $dbObj->orderBy('roles.id','asc')->paginate('10');
        $layoutArr                                                          =   array(
            'sortFilterArr'         => array(
                'organisation_name'    => $organisation_name,
            ),
            'custompaginatorres'    => $custompaginatorres
        );
        $this->layout->content                                              =   View::make('developemtmaster.addrolelisting',array('layoutArr'=>$layoutArr));
    }

    /*
    Used for Add/Edit/Delete Menu
    */
    public function getAddmenulisting(){
        $this->layout                                                       =   View::make('layouts.ajax');
        $inputArr                                                           =   Input::all();
        $organisation_name                                                          =   '';
        $dbObj                                                              =   DB::table('menus');
        if(isset($inputArr['status_list']) && $inputArr['status_list'] != ''){
            $status_list                                                       =   $inputArr['status_list'];
            if($status_list == 1){
                $dbObj->where('menus.is_active','=','Y');
            }else if($status_list == 2){
                $dbObj->where('menus.is_active','=','N');
            }
        }
        //echo "<pre>"; print_r($inputArr); echo "<pre>";
        if(isset($inputArr['menu_name_list']) && $inputArr['menu_name_list'] != ''){
            $menu_name_list                                                  =   $inputArr['menu_name_list'];
            $dbObj->where('menus.menu_name','LIKE','%'.$menu_name_list.'%');
        }
        $custompaginatorres                                                 =   $dbObj->orderBy('menus.id','asc')->paginate('10');
        $layoutArr                                                          =   array(
            'sortFilterArr'         => array(
                'organisation_name'    => $organisation_name,
            ),
            'custompaginatorres'    => $custompaginatorres
        );
        $this->layout->content                                              =   View::make('developemtmaster.addmenulisting',array('layoutArr'=>$layoutArr));
    }


    public function getAddsubmenulisting(){
        $this->layout                                                       =   View::make('layouts.ajax');
        $inputArr                                                           =   Input::all();
        $organisation_name                                                          =   '';
        $dbObj                                                              =   DB::table('sub_menus');
        if(isset($inputArr['status_list']) && $inputArr['status_list'] != ''){
            $status_list                                                       =   $inputArr['status_list'];
            if($status_list == 1){
                $dbObj->where('sub_menus.is_active','=','Y');
            }else if($status_list == 2){
                $dbObj->where('sub_menus.is_active','=','N');
            }
        }

        if(isset($inputArr['menu_id_list']) && $inputArr['menu_id_list'] != ''){
            $menu_id_list                                                  =   $inputArr['menu_id_list'];
            $dbObj->where('sub_menus.menu_id','=',$menu_id_list);
        }
        //echo "<pre>"; print_r($inputArr); echo "<pre>";
        if(isset($inputArr['submenu_name_list']) && $inputArr['submenu_name_list'] != ''){
            $menu_name_list                                                  =   $inputArr['submenu_name_list'];
            $dbObj->where('sub_menus.sub_menu_name','LIKE','%'.$menu_name_list.'%');
        }
        $custompaginatorres                                                 =   $dbObj->orderBy('sub_menus.id','asc')->paginate('10');
        $layoutArr                                                          =   array(
            'sortFilterArr'         => array(
                'organisation_name'    => $organisation_name,
            ),
            'custompaginatorres'    => $custompaginatorres
        );
        $this->layout->content                                              =   View::make('developemtmaster.addsubmenulisting',array('layoutArr'=>$layoutArr));
    }

    /* Used for Assign Role Menu */
    public function assignrolemenu(){
        $roles =  Role::all();
        return view('roleManagement.assignrolemenu', compact('roles'));
    }

    public function getRolewisemenu($role_id)
    {
        $menuSubMenuArr =   array();
        $editMenuList   =   array();
        $editSubMenuList  =   array();
        $editMenuListFind =  DB::table('role_menus')
                        ->where('role_id',$role_id)
                        ->select(array('role_menus.menu_id','role_menus.sub_menu_id'))
                        ->get();

               if(count($editMenuListFind) != 0){
                        foreach($editMenuListFind AS $editMenuListKey => $editMenuListVal) {
                            $editMenuList[] = $editMenuListVal->menu_id;
                            $editSubMenuList[] = $editMenuListVal->sub_menu_id;
                        }

                   $menuSubMenuObj = Menu::with(array('submenus' => function($query){
                       $query->where('sub_menus.is_active','=','1')
                           ->orderBy('sub_menus.sub_menu_order');
                   }))
                       ->where('menus.is_active','=','1')
                       ->orderBy('menus.menu_order')
                       ->get();

                   if(is_object($menuSubMenuObj)){
                       $menuSubMenuArr = $menuSubMenuObj->toArray();
                   }
                   $layoutArr  =   array(
                       'menuSubMenuArr'   =>  $menuSubMenuArr,
                       'editMenuList'     =>  $editMenuList,
                       'editSubMenuList'  =>  $editSubMenuList,
                   );
                   return response()->json($layoutArr);
               }
    }

    public function getRolewisemenu1() {
        
        $this->layout                       =   View::make('layouts.ajax');
        $menuSubMenuArr                     =   array();
        $editMenuList                       =   array();
        $editSubMenuList                    =   array();
        $role_id                            =   (int)Input::get('role_id');
        if($role_id != 0){
            $editMenuListFind               =   DB::table('role_menus')
                ->where('role_menus.role_id','=',$role_id)
                ->select(array('role_menus.menu_id','role_menus.sub_menu_id'))
                ->get();
            if(is_array($editMenuListFind) && count($editMenuListFind) > 0){
                foreach($editMenuListFind AS $editMenuListKey => $editMenuListVal){
                    $editMenuList[]         =   $editMenuListVal->menu_id;
                    $editSubMenuList[]      =   $editMenuListVal->sub_menu_id;
                }
            }
        }
        $menuSubMenuObj                                                     =   Menu::with(array('submenus' => function($query){
            $query->where('sub_menus.is_active','=','Y')
                ->orderBy('sub_menus.sub_menu_order');
        }))
            ->where('menus.is_active','=','Y')
            ->orderBy('menus.menu_order')
            ->get();
        if(is_object($menuSubMenuObj)){
            $menuSubMenuArr                                                 =   $menuSubMenuObj->toArray();
        }
        $layoutArr                                                          =   array(
            'menuSubMenuArr'  =>  $menuSubMenuArr,
            'editMenuList'    =>  $editMenuList,
            'editSubMenuList' =>  $editSubMenuList,
        );
        $this->layout->content =  View::make('developemtmaster.rolewisemenu',array('layoutArr'=>$layoutArr));
    }

    public function postSaverolemenu() {
        $valiationArr                                                       =   array();
        if(isset(Auth::user()->id) && Auth::user()->id){
            $formData                                                       =   Input::all();
            $formDataArr                                                    =   array();
            if(isset($formData['formdata']) && $formData['formdata'] != ''){
                parse_str($formData['formdata'],$formDataArr);
                // echo "<pre>"; print_r($formDataArr); echo "<pre>"; exit;
                $validator                                                  =   Validator::make($formDataArr['RoleMenu'],RoleMenu::$rules,RoleMenu::$messages);
                if ($validator->fails()){
                    $errorArr                                               =   $validator->getMessageBag()->toArray();
                    if(isset($errorArr) && is_array($errorArr) && count($errorArr) > 0){
                        foreach($errorArr as $errorKey=>$errorVal){
                            $valiationArr[]                                 =   array(
                                'modelField'            =>  $errorKey,
                                'modelErrorMsg'         =>  $errorVal[0],
                            );
                        }
                        echo '****FAILURE****'.json_encode($valiationArr);exit;
                    }
                }else{
                    if((isset($formDataArr['menuIdArr']) && is_array($formDataArr['menuIdArr']) && count($formDataArr['menuIdArr']) > 0 )
                        ||
                        (isset($formDataArr['subMenuIdArr']) && is_array($formDataArr['subMenuIdArr']) && count($formDataArr['subMenuIdArr']) > 0 )
                    ){
                        $loopCnt                                =   0;
                        $saveCnt                                =   0;
                        $role_id                                =   $formDataArr['RoleMenu']['role_id'];
                        DB::beginTransaction();

                        if(DB::table('role_menus')->where('role_id', '=',$role_id)->count()){
                            try {
                                $loopCnt++;
                                DB::table('role_menus')->where('role_id', '=',$role_id)->delete();
                                $saveCnt++;
                            }catch(ValidationException $e){
                            } catch(\Exception $e){
                            }
                        }
                        if(isset($formDataArr['menuIdArr']) && is_array($formDataArr['menuIdArr']) && count($formDataArr['menuIdArr']) > 0){
                            foreach($formDataArr['menuIdArr'] as $key=>$val){
                                $loopCnt++;
                                $dataArrInsert                              =   array(
                                    'role_id'                   =>   $role_id,
                                    'menu_id'                   =>   $val,
                                    'sub_menu_id'               =>   null,
                                    'created_at'                =>   date('Y-m-d h:i:s'),
                                    'updated_at'                =>   date('Y-m-d h:i:s'),
                                );
                                try {
                                    DB::table('role_menus')->insert($dataArrInsert);
                                    $saveCnt++;
                                } catch(ValidationException $e){
                                } catch(\Exception $e){
                                }
                            }
                        }
                        if(isset($formDataArr['subMenuIdArr']) && is_array($formDataArr['subMenuIdArr']) && count($formDataArr['subMenuIdArr']) > 0){
                            foreach($formDataArr['subMenuIdArr'] as $key=>$val){
                                $loopCnt++;
                                $menu_id                                    =   $this->getMasterID($val,'sub_menus','menu_id');
                                $dataArrInsert                              =   array(
                                    'role_id'                   =>   $role_id,
                                    'menu_id'                   =>   $menu_id,
                                    'sub_menu_id'               =>   $val,
                                    'created_at'                =>   date('Y-m-d h:i:s'),
                                    'updated_at'                =>   date('Y-m-d h:i:s'),
                                );
                                //echo "<pre>"; print_r($dataArrInsert); echo "<pre>";  //exit;
                                try {
                                    DB::table('role_menus')->insert($dataArrInsert);
                                    $saveCnt++;
                                } catch(ValidationException $e){
                                } catch(\Exception $e){
                                }
                            }
                        }
                        //exit;
                        if($loopCnt == $saveCnt){
                            DB::commit();
                            echo '****SUCCESS****Role menu has been saved successfully.';
                        }else{
                            DB::rollback();
                            echo '****ERROR****Unable to save Role menu.';
                        }
                    }else{
                        echo '****ERROR****Please select at least one menu or sub menu.';
                    }exit;
                }
            }
        }
    }


}