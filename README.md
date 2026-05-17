# PHPStorm Cakephp fixture factories HighCpu usage

This is a test repository to proof the high cpu usage.

## Init

```shell
git clone https://github.com/Erwane/phpstorm-cakephp-highcpu-usage.git
cd phpstorm-cakephp-highcpu-usage
docker compose up -d
```

## PhpStorm with logs

in a terminal, launch phpstorm with this project dir.

```shell
phpstorm /path/to/this/project/phpstorm-cakephp-highcpu-usage
```

Opening `tests/TestCase/HighCpuTest.php` and `GeoDepartmentFactory` don't generate anything.

Now, update vendors from `composer.json` file.
```shell
docker compose exec -w /var/www/html php composer update
```
reload files with `ctrl + alt + y` and re-open `tests/TestCase/HighCpuTest.php` and `GeoDepartmentFactory`

You terminal (the one where you launched phpstorm) should have a lot of lines like this :

```text
2026-05-17 17:11:57,563 [1919291]   WARN - #c.j.p.l.p.r.t.PhpType - SOE in PhpType.global @ #M#M#C\App\Test\Factory\GeoDepartmentFactory.makeChain.persist|#M#π(#M#C\App\Test\Factory\GeoDepartmentFactory.makeChain).persist|#π(#M#M#C\App\Test\Factory\GeoDepartmentFactory.makeChain.persist)|#π(#M#π(#M#C\App\Test\Factory\GeoDepartmentFactory.makeChain).persist)|?
```

In a project with multiples tests and more reference to Factory, there is thousands of logs and CPU is too high.

## Fix ?

Replacing `"dereuromark/cakephp-fixture-factories": "^1.4",` by `"vierge-noire/cakephp-fixture-factories": "^v3.0",` and updating, fix all the logs.
