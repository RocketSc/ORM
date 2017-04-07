<?php


namespace App;


interface ModelInterface
{
    public function load(int $id) : Model;
    public function save(Model $model) : boolean;
    public function update(Model $model) : boolean;
    public function destroy(int $id) : boolean;
}