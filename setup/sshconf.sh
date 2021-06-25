mkdir -p ~/.ssh/
echo $3 > ~/.ssh/deploy.key
chmod 600 ~/.ssh/deploy.key
cat >>~/.ssh/config <<END
    Host deploy
    HostName $1
    User $2
    IdentityFile ~/.ssh/deploy.key
    StrictHostKeyChecking no
END