<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['key', 'value', 'description'];
    protected $useTimestamps = false;

    // ambil value by key
    public function getValue(string $key)
    {
        return $this->where('key', $key)
                    ->select('value')
                    ->get()
                    ->getRow('value');
    }

    // update / insert value
    public function setValue(string $key, $value)
    {
        $exists = $this->where('key', $key)->first();

        if ($exists) {
            return $this->update($exists['id'], [
                'value' => $value
            ]);
        }

        return $this->insert([
            'key'   => $key,
            'value' => $value
        ]);
    }
}
