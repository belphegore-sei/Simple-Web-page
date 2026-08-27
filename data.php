<?php
$date = [
    'weekday' => 'WED',
    'month' => '08',
    'day' => '26',
    'weather' => 'CLEAR',
    'time' => 'AFTER SCHOOL',
];
$stats = [
    ['id' => 'knowledge', 'label' => 'KNOWLEDGE', 'rank' => '4', 'title' => 'DISTINGUISHED'],
    ['id' => 'charm', 'label' => 'CHARM', 'rank' => '3', 'title' => 'SUAVE'],
    ['id' => 'guts', 'label' => 'GUTS', 'rank' => '5', 'title' => 'BOLD'],
    ['id' => 'kindness', 'label' => 'KINDNESS', 'rank' => '2', 'title' => 'CONSIDERATE'],
    ['id' => 'proficiency', 'label' => 'PROFICIENCY', 'rank' => '3', 'title' => 'DEFT'],
];
$thieves = [
    ['codename' => 'JOKER', 'name' => 'RENEGADE', 'arcana' => 'FOOL', 'hp' => 412, 'sp' => 287, 'persona' => 'ARSèNE'],
    ['codename' => 'SKULL', 'name' => 'RYUJI', 'arcana' => 'CHARIOT', 'hp' => 398, 'sp' => 164, 'persona' => 'CAPTAIN KIDD'],
    ['codename' => 'PANTHER', 'name' => 'ANN', 'arcana' => 'LOVERS', 'hp' => 321, 'sp' => 241, 'persona' => 'CARMEN'],
    ['codename' => 'MONA', 'name' => 'MORGANA', 'arcana' => 'MAGICIAN', 'hp' => 276, 'sp' => 198, 'persona' => 'ZORRO'],
];
$confidants = [
    ['arcana' => 'PRIESTESS', 'name' => 'MAKOTO', 'rank' => 8, 'location' => 'SHUJIN ACADEMY'],
    ['arcana' => 'EMPRESS', 'name' => 'HARU', 'rank' => 6, 'location' => 'SCHOOL ROOFTOP'],
    ['arcana' => 'EMPEROR', 'name' => 'YUSUKE', 'rank' => 7, 'location' => 'KANDA CHURCH'],
    ['arcana' => 'HIEROPHANT', 'name' => 'SOJIRO', 'rank' => 9, 'location' => 'CAFE LEBLANC'],
    ['arcana' => 'JUSTICE', 'name' => 'GORO', 'rank' => 5, 'location' => 'KICHIOJI'],
    ['arcana' => 'DEATH', 'name' => 'TAE', 'rank' => 10, 'location' => 'TAKEMI CLINIC'],
];
$log = [
    'THE WILL OF REBELLION STILL BURNS.',
    'A PALACE DISTORTION WAS DETECTED IN SHIBUYA.',
    'CONFIDANT RANKS CAN BE RAISED AFTER SCHOOL.',
    'TAKE YOUR TIME. CHANGE YOUR HEART.',
];
$theme = (isset($_GET['theme']) && $_GET['theme'] === 'p3') ? 'p3' : 'p5';
$copy = $theme === 'p3'
    ? [
        'banner' => 'DARK HOUR',
        'subtitle' => 'SPECIALIZED EXTRACURRICULAR EXECUTION SQUAD',
        'cta' => 'THE TIME FOR ACTION IS NOW',
        'menu' => [
            ['id' => 'status', 'label' => 'STATUS'],
            ['id' => 'persona', 'label' => 'PERSONA'],
            ['id' => 'equip', 'label' => 'EQUIP'],
            ['id' => 'item', 'label' => 'ITEM'],
            ['id' => 'skill', 'label' => 'SKILL'],
            ['id' => 'system', 'label' => 'TACTICS'],
        ],
    ]
    : [
        'banner' => 'TAKE YOUR HEART',
        'subtitle' => 'PHANTOM THIEVES OF HEARTS',
        'cta' => 'I AM THOU, THOU ART I',
        'menu' => [
            ['id' => 'status', 'label' => 'STATUS'],
            ['id' => 'persona', 'label' => 'PERSONA'],
            ['id' => 'skill', 'label' => 'SKILL'],
            ['id' => 'item', 'label' => 'ITEM'],
            ['id' => 'equip', 'label' => 'EQUIP'],
            ['id' => 'system', 'label' => 'SYSTEM'],
        ],
    ];
