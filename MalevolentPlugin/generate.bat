@echo on
echo Updating submodules...
call git submodule update --init --recursive

echo Running premake...
call tools\premake5 %* vs2022

pause