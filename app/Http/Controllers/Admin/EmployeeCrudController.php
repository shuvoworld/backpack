<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmployeeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmployeeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Employee::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/employee');
        CRUD::setEntityNameStrings('employee', 'employees');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name')->type('text');
        CRUD::column('mobile')->type('text');
        CRUD::column('email')->type('text');
        // For designation generate column code
        CRUD::addColumn([
            'label' => 'Designation',
            'type' => 'select',
            'name' => 'designation_id',
            'entity' => 'designation',
            'attribute' => 'name',
            'model' => \App\Models\Designation::class
        ]);
        // For employee type generate column code
        CRUD::addColumn([
            'label' => 'Category',
            'type' => 'select',
            'name' => 'employee_type_id',
            'entity' => 'employeeType',
            'attribute' => 'name',
            'model' => \App\Models\EmployeeType::class
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(EmployeeRequest::class);
        CRUD::field('name')->type('text');
        CRUD::field('mobile')->type('text');
        CRUD::field('email')->type('text');
        CRUD::field([
            'label' => 'Designation',
            'type' => 'select2',
            'name' => 'designation_id',
            'model' => \App\Models\Designation::class
        ]);
        CRUD::field([
            'label' => 'Category',
            'type' => 'select2',
            'name' => 'employee_type_id',
            'model' => \App\Models\EmployeeType::class,
            'attribute' => 'name'
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
