<?php

namespace Shezo\Popup\Api\Data;

interface PopupInterface
{
    public const TABLE_NAME = 'shezo_popup';
    public const ID = 'popup_id';
    public const NAME = 'name';
    public const CONTENT = 'content';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const IS_ACTIVE = 'is_active';
    public const TIMEOUT = 'timeout';


}
