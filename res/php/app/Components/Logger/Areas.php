<?php

namespace REC1\Components\Logger;

/**
 * @todo Docomentacion
 */
abstract class Areas {

    const UNKNOWN = 0;
    const DATABASE_CONFIG = 1;
    const DATABASE_CONFIG_ERROR = 2;
    const DATABASE_CONNECTION = 3;
    const DATABASE_CONNECTION_ERROR = 4;
    const DATABASE_METHODS = 5;
    const DATABASE_METHODS_ERROR = 6;
    const CORE_CONFIG = 7;
    const CORE_CONFIG_ERROR = 8;
    const CORE = 9;
    const CORE_ERROR = 10;
    const CORE_INSTALLER = 11;
    const CORE_INSTALLER_ERROR = 12;
    const PAGE_MANAGER = 13;
    const PAGE_MANAGER_ERROR = 14;
    const USERS = 15;
    const USERS_ERROR = 16;
    const USERS_TOKEN = 17;
    const USERS_TOKEN_ERROR = 18;
    const USERS_SESSIONS = 19;
    const USERS_SESSIONS_ERROR = 20;
    const COOKIES = 21;
    const COOKIES_ERROR = 22;
    const FORMATS_CARRERAS = 23;

}
