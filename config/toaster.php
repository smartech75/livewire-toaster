<?php declare(strict_types=1);

return [

    /**
     * Add an additional second for every 100th word of the toast messages.
     *
     * Supported: true | false
     */
    'accessibility' => true,

    /**
     * The on-screen duration of each toast.
     *
     * Minimum: 3000 (in milliseconds)
     */
    'duration' => 3000,

    /**
     * The on-screen position of each toast.
     *
     * Supported: "center", "left" or "right"
     */
    'position' => 'right',

    /**
     * Whether messages passed as translation keys should be translated automatically.
     *
     * Supported: true | false
     */
    'translate' => true,
];
