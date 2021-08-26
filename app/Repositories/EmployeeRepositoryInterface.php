<?php

namespace App\Repositories;

interface EmployeeRepositoryInterface
{
    public function store(Request $request);

    public function update(Request $request, $id);

    public function destroy($id);
}