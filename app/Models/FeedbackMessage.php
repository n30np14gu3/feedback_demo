<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedbackMessage
 * @package App\Models
 *
 * @property int id
 * @property string message_name
 * @property string message_topic
 * @property string message_text
 */
class FeedbackMessage extends Model
{
    use HasFactory;

    protected $table = 'messages';
}
