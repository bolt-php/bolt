<?php

use framework\db\ActiveModel;
use framework\validation\Model;
use framework\db\transformers\DateTimeTransformer;
use framework\web\transformers\UploadedFileTransformer;

app()->di->setFallback(function ($name, $type, $params) {
    if (isset($params[$name])) {
        if (is_subclass_of($type, ActiveModel::class)) {
            return $type::find($params[$name]);
        }
    } else if (is_subclass_of($type, Model::class) && request()->method() == 'POST') {
        $model = new $type();
        $model->fill(request()->post(), request()->files());
        return $model;
    }

    return null;
});

Model::registerTypeTransformer('DateTime', new DateTimeTransformer());
Model::registerTypeTransformer(\framework\web\request\UploadedFile::class, new UploadedFileTransformer());