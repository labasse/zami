mkdir -p ~/.ssh/
echo $SSH_KEY > ~/.ssh/deploy.key
chmod 600 ~/.ssh/deploy.key
cat >>~/.ssh/config <<END
    Host deploy
    HostName $SSH_HOST
    User $SSH_USER
    IdentityFile ~/.ssh/deploy.key
    StrictHostKeyChecking no
END